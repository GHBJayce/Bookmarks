# Bookmarks

## 初次使用

1. 安装依赖

    ```shell
    composer install
    ```

1. 必要配置

    ```shell
    composer run post-root-package-install
    comppser run post-create-project-cmd
    # 或者
    php -r "file_exists('.env') || copy('.env.example', '.env');"
    php artisan key:generate --ansi
    ```

1. 静态资源

    ```shell
    php artisan vendor:publish --provider="Encore\Admin\AdminServiceProvider"
    ```

1. 检查`./storage`目录是否有写入权限

    ```shell
    chmod 0777 -R ./storage/
    ```