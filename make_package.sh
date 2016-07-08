#!/bin/bash

# get version information from config.php
VERSION=$(grep "\$version" config.php |  sed 's/^.*[^0-9]\([0-9]*\.[0-9]*\.[0-9]*\).*$/\1/')

# Release package name
PACKAGE_FOLDER=vostan_cms_${VERSION}

echo "Creating package of version $VERSION"

# Remove if older packages with the same name exist
echo "Removing older packages of the same version..."
rm -fr $PACKAGE_FOLDER $PACKAGE_FOLDER.zip
if [ $? -ne 0 ]
then
	echo "Error: Cannot remove old packages of the same version"
	exit 1
fi

# create folder with the  latest 
echo "Exporting the files from repository..."
git checkout-index -a -f --prefix=$PACKAGE_FOLDER/
if [ $? -ne 0 ]
then
	echo "Error: Faled to export files from git repository"
	exit 1
fi

rm $PACKAGE_FOLDER/make_package.sh

echo "Setting permissions..."
chmod a+w $PACKAGE_FOLDER $PACKAGE_FOLDER/vostan.db
chmod -R a+w $PACKAGE_FOLDER/assets $PACKAGE_FOLDER/vostan_export
if [ $? -ne 0 ]
then
	echo "Error: Faled to set permissions"
	exit 1
fi


echo "Packaging..."
zip -r $PACKAGE_FOLDER.zip $PACKAGE_FOLDER &> /dev/null
if [ $? -ne 0 ]
then
	echo "Error: Faled to create zip package"
	exit 1
fi

rm -fr $PACKAGE_FOLDER

echo "Done! Created package $PACKAGE_FOLDER.zip"

