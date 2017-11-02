sudo add-apt-repository ppa:ondrej/php -y
sudo apt-get update -y
sudo apt-get install php7.0-curl php7.0-dev php7.0-gd php7.0-intl php7.0-mcrypt php7.0-json php7.0-mysql php7.0-opcache php7.0-bcmath php7.0-mbstring php7.0-soap php7.0-xml
sudo apt-get install libapache2-mod-php7.0 -y

sudo a2dismod php5
sudo a2enmod php7.0

sudo apt-get install mysql-server-5.6

#apache2 serveri restardi jaoks
sudo service apache2 restart

#composeriga laraveli projekti loomine
composer create-project --prefer-dist laravel/laravel blog

#change server public folder from "DocumentRoot /home/ubuntu/workspace" to "DocumentRoot /home/ubuntu/workspace/public"
sudo nano /etc/apache2/sites-enabled/001-cloud9.conf
