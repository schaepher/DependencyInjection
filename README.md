# DependencyInjection

- phase 1  
    用 new 创建 Service 对象  
- phase 2  
    用getXxxService获取 Service 对象
- phase 3  
    用 getService 获取 Service 对象
- phase 4  
    把 getService 单独抽离出来—— Container
- phase 5  
    用配置文件配置默认的返回对象—— Config
- phase 6  
    整合服务—— ServiceProvider
- phase 7  
    依赖自动注入—— DI
- phase 8  
    接口替代具体类—— IOC
- phase 9  
    门面模式—— Facade

# 注

为了代码简单，基本没写错误处理。  

phase 8 使用 Contract （合同、契约）作为接口文件夹的名称。

index.php 的用法：`php index.php 类名 方法名 参数1 参数2 ... 参数n`