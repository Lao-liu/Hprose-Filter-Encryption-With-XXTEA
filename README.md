# Hprose-Filter-Encryption-With-XXTEA
Hprose encryption use XXTEA with HproseFilter

### 简述
简单实现了通过Filter加密所有请求和只加密请求参数2种方式。

[Hprose-php](http://github.com/hprose/hprose-php)

[xxtea-php](https://github.com/xxtea/xxtea-php)

### 环境配置

#### Install Hprose-php
```
# PHP扩展 包含hprose序列化和反序列化
pecl install hprose
# Hprose 源码
git clone http://github.com/hprose/hprose-php.git
```

#### Install XXTEA
XXTEA(http://github.com/xxtea)

```
# PHP扩展
pecl install xxtea
# 下载PHP版
git clone https://github.com/xxtea/xxtea-php.git
```