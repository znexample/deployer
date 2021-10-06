
Установить права на запись для папки /var/www

Или добавть пользователя в группу www-data.

## Perm

    sudo chmod -R ugo+rwx /etc/apache2
    sudo chmod -R ugo+rwx /etc/apache2/sites-available
    sudo chmod -R ugo+rwx /etc/php
    sudo chmod ugo+rwx /etc/hosts
    sudo chmod -R ugo+rwx /var/www
    
    mv /etc/apache2/sites-enabled /etc/apache2/sites-enabled.bak
    ln -s /etc/apache2/sites-available /etc/apache2/sites-enabled
    
    mv /etc/apache2/apache2.conf /etc/apache2/apache2.conf.bak

## Root

Чтобы добавить пользователя в группу, выполните команду ниже от имени пользователя 
root или другого пользователя sudo. Убедитесь, что вы заменили «username» на имя 
пользователя, которому вы хотите предоставить разрешения.

    sudo usermod -aG sudo user

Предоставления доступа sudo с помощью этого метода достаточно для большинства 
случаев использования.

Чтобы убедиться, что у пользователя есть привилегии sudo, выполните команду whoami :

    sudo whoami

Вам будет предложено ввести пароль. Если у пользователя есть доступ к sudo, 
команда выведет «root»:

    root

Если вы получаете сообщение об ошибке «пользователя нет в файле sudoers», 
это означает, что у пользователя нет прав sudo.
