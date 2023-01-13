# 框架介绍
##### 模仿laravel， 功能 服务 组件化
##### 1 规范目录结构，设置目录用途
##### 2 设置nginx 访问index.php文件
##### 3 composer require 指定包完成初始化
##### 4 设置 git 忽略文件

## 一、框架使用package

### 日志package
monolog

官方使用介绍地址：https://packagist.org/packages/monolog/monolog

### 路由package
macaw

官方使用介绍地址：https://packagist.org/packages/noahbuscher/macaw

#### 扩展包分析
##### 1 在首页文件引入 
##### 2 然后中间写符合规格的结构化请求方法（静态方法，会把所有结构化数据放到一个array中）
##### 3 最后调用display方法（获取请求路径然后和路由文件中方法匹配）
##### 4 匹配成功会实例相应的controller 然后调用类中的 function 返回

### 视图package
twig

官方使用介绍地址： https://packagist.org/packages/twig/twig

### 模型package
medoo

官方使用介绍地址： https://packagist.org/packages/catfan/medoo

### http请求
guzzle

官方使用介绍地址： https://packagist.org/packages/guzzlehttp/guzzle

### redis使用
redis

官方使用介绍地址： https://packagist.org/packages/predis/predis

### ant
redis

官方使用介绍地址： https://www.yuque.com/ant-design/course/wybhm9

####初始化项目
node -v
npm -v

安装cnpm
npm install -g cnpm --registry=https://registry.npm.taobao.org


## 二、版本使用限制
PHP >= 7.2

mysql >= 8.0

redis

nginx

node

npm

## 三、安装
php composer install



## layui
官方使用介绍地址： https://www.bejson.com/doc/layui/doc/element/layout.html


## 四、优化方向

##### 1、代码结构分层 model repository service controller view 
##### 2、代码开始运行环境检查，避免运行中因为环境问题运行失败
##### 3、返回结构规整
##### 3、控制反转
