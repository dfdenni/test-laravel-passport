#!bin/sh

find ~/repos/mylaravel.app -type d -exec sudo chmod 755 {} \;
find ~/repos/mylaravel.app -type f -exec sudo chmod 644 {} \;
sudo chmod 777 -R storage
sudo chmod +x set_permission.sh
