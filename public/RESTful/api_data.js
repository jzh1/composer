define({ "api": [
  {
    "type": "post",
    "url": "/login",
    "title": "登录获取token",
    "version": "0.1.0",
    "name": "login",
    "group": "LoginController",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "content-type",
            "description": "<p>application/json</p>"
          }
        ]
      }
    },
    "description": "<p>后台用户登录，并获取token</p> <p>LoginController::login</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "user",
            "description": "<p>用户名</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>密码</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "请求示例:",
          "content": "{\"user\":\"admin\",\"password\":\"admin1111\"}",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "code",
            "description": "<p>成功标识</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>成功信息</p>"
          },
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "data",
            "description": ""
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.authType",
            "description": "<p>token类型,取值范围 user:后台用户 customer:登陆用户</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.token",
            "description": "<p>用户 token</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "成功响应:",
          "content": "{\"code\":200,\"message\":\"login success\",\"data\":{\"token\":\"sfafsafsdffdfsfsf\",\"authType\":\"user\"}}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "code",
            "description": "<p>当有错误返回非200</p>"
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "message",
            "description": "<p>错误信息</p>"
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "error",
            "description": "<p>错误描述</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error: 400",
          "content": "{\"code\":400,\"message\":\"login error\",\"data\":[]}",
          "type": "json"
        }
      ]
    },
    "filename": "apiDoc/Customer.php",
    "groupTitle": "LoginController"
  }
] });
