#!/usr/bin/env bash

echo ""
echo "Update Permissions"
echo ""

chown -R training.www-data /home/training/projects/magento2/app/etc
chmod -R 664 /home/training/projects/magento2/app/etc
chmod -R +X /home/training/projects/magento2/app/etc

chown -R training.www-data /home/training/projects/magento2/pub/static
chmod -R 664 /home/training/projects/magento2/pub/static
chmod -R +X /home/training/projects/magento2/pub/static

chown -R training.www-data /home/training/projects/magento2/pub/media
chmod -R 664 /home/training/projects/magento2/pub/media
chmod -R +X /home/training/projects/magento2/pub/media

chown -R training.www-data /home/training/projects/magento2/var
chmod -R 664 /home/training/projects/magento2/var
chmod -R +X /home/training/projects/magento2/var

chmod +x /home/training/projects/magento2/bin/*

echo ""
echo "  => Finish"
echo ""
