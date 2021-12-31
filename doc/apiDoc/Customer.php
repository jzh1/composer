<?php
/**
 * 2012-2020 D1m Group
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0) that is available
 * through the world-wide-web at this URL: http://www.opensource.org/licenses/OSL-3.0
 * If you are unable to obtain it through the world-wide-web, please send an email
 * to sales@d1m.cn so we can send you a copy immediately.
 *
 * @author d1m group
 * @copyright 2012-2020 D1m
 * @license http://www.opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 */

/**
 * @apiDefine Lvmh_Customer  用户::Lvmh_Customer
 */

/**
 * @api {post} /rest/{store_view_code}/V1/applet/login a.登录获取token
 * @apiVersion 0.1.0
 * @apiName appletLogin
 * @apiGroup Lvmh_Customer
 * @apiHeader {String} content-type application/json
 *
 * @apiDescription
 *
 * 小程序登录，并获取token
 *
 * Lvmh_Customer::CustomerInterface->appletLogin
 *
 * @apiParam {String} code 微信页面code
 * @apiParam {Number} forceToken 1 是 0 否 是否强制清理token(适用于游客模式)
 * @apiParamExample 请求示例:
 * {"code":"031crEkl2s0Rb642BEkl26UWkj0crEkn","forceToken":1"}
 *
 * @apiSuccess {Number} code 成功标识
 * @apiSuccess {String} message 成功信息
 * @apiSuccess {Object} data
 * @apiSuccess {String} data.code 微信code
 * @apiSuccess {String} data.authType token类型,取值范围 quoteAuth:游客 Bearer:会员
 * @apiSuccess {String} data.token 游客或者会员token
 * @apiSuccess {String} data.openid 用户openid
 * @apiSuccess {String} data.unionid 用户unionid
 * @apiSuccess {String} data.ip 用户IP
 * @apiSuccess {Object} [data.customer] 用户信息,会员才有此字段
 * @apiSuccess {Integer} [data.customer.id] 用户id
 * @apiSuccess {Integer} [data.customer.customerId] 用户id
 * @apiSuccess {String} [data.customer.mobile] 用户mobile
 * @apiSuccess {String} [data.customer.homePhone] 用户固话
 * @apiSuccess {Integer} [data.customer.groupId] 用户分组id
 * @apiSuccess {String} [data.customer.email] 用户email
 * @apiSuccess {String} [data.customer.openid] 用户openid
 * @apiSuccess {String} [data.customer.unionid] 用户unionid
 * @apiSuccess {String} [data.customer.firstname] 用户firstname
 * @apiSuccess {String} [data.customer.lastname] 用户lastname
 * @apiSuccess {String} [data.customer.dob] 用户生日
 * @apiSuccess {String} [data.customer.title] 称谓
 * @apiSuccess {Number} [data.customer.gender] 用户性别，1：男 2：女 3:保密
 * @apiSuccess {String} [data.customer.country] 用户国家
 * @apiSuccess {String} [data.customer.place] 用户居住地
 * @apiSuccess {Integer} [data.customer.regionId] 用户省份id
 * @apiSuccess {String} [data.customer.region] 用户省份
 * @apiSuccess {Integer} [data.customer.cityId] 用户城市id
 * @apiSuccess {String} [data.customer.city] 用户城市
 * @apiSuccess {Integer} [data.customer.districtId] 用户县区id
 * @apiSuccess {String} [data.customer.district] 用户县区
 * @apiSuccess {String} [data.customer.street] 用户详细地址
 * @apiSuccess {Integer} [data.customer.optin] 是否接收咨询 1：接收 0：不接受
 * @apiSuccess {Object} [data.config] 配置信息，会员才有此字段
 * @apiSuccess {Boolean} [data.config.canChangeMobile] 是否可以修改手机号
 * @apiSuccess {Boolean} [data.config.canChangeDob] 是否可以修改生日
 * @apiSuccessExample 成功响应（游客）:
 * {"code":1,"message":"","data":{"code":"071R0Tll2uC3c64189ll25OIo13R0TlT","authType":"quoteAuth","token":"g62Vd4CoYPW4GjGbtFINvBJlhhlvF1W3","openid":"oBsvu4oRgA3FRqKDKfRdJc9JISjI","ip":"127.0.0.1","unionid":"unionid001","customer":[]}}
 *
 * * @apiSuccessExample 成功响应（会员）:
 * {"code":1,"message":"","data":{"code":"051kUs1w3JkYwV2i094w3QkUrE4kUs1Q","isBind":true,"customer":{"id":"11","customerId":"11","groupId":"1","mobile":"15xxxxxxxxx","openid":"oBsvu4oRgA3FRqKDKfRdJc9JISjI","unionid":"unionid001","email":"xxx@xx.cn","homePhone":null,"title":"\u5148\u751f","gender":"1","firstname":"xxx","lastname":"xx","dob":"1912-12-16","country":"cn","place":"cn","regionId":"702","cityId":"1","districtId":"1","region":"\u798f\u5efa\u7701","city":"\u798f\u5dde\u5e02","district":"\u9f13\u697c\u533a","street":"\u8be6\u7ec6\u5730\u5740","optin":"1"},"config":{"canChangeMobile":true,"canChangeDob":true},"authType":"Bearer","token":"905caeh9yhuiiqlrifcmh2iqja1v2j56","openid":"oBsvu4oRgA3FRqKDKfRdJc9JISjI","ip":"127.0.0.1","unionid":"unionid001"}}
 *
 * @apiError code 当有错误返回非1
 * @apiError message 错误信息
 * @apiError error 错误描述
 * @apiError data
 * @apiError data.code 微信code
 * @apiErrorExample Error: 500
 * {"code":3,"message":"customer login failed","data":{"code":"051jHQkl21RVb64el0ml2nBuYX2jHQkX"},"error":"get openid failed"}
 **/

/**
 * @api {post} /rest/{store_view_code}/V1/applet/grantMobile b.授权手机号
 * @apiVersion 0.1.0
 * @apiName appletGrantMobile
 * @apiGroup Lvmh_Customer
 * @apiHeader {String} content-type application/json
 * @apiHeader {String} Authorization 游客：quoteAuth+空格+Token  会员：Bearer+空格+Token
 *
 * @apiDescription
 *
 * 小程序授权获取用户手机号
 *
 * Lvmh_Customer::CustomerInterface->grantMobile
 *
 * @apiParam {String} encryptedData 加密数据
 * @apiParam {String} iv 初始向量（小程序返回）
 * @apiParamExample 请求示例:
 * {"encryptedData":"**********","iv":"XXXXXXXXX"}
 *
 * @apiSuccess {Number} code 成功标识
 * @apiSuccess {String} message 成功信息
 * @apiSuccess {Object} data
 * @apiSuccess {String} data.mobile 微信纯净手机号
 * @apiSuccess {Object} data.wechatData 微信数据
 * @apiSuccess {String} data.wechatData.purePhoneNumber 纯净手机号
 * @apiSuccess {String} data.wechatData.phoneNumber 带国家号的手机号
 * @apiSuccessExample 成功响应:
 * {"code":1,"message":"","data":{"mobile":"15xxxxxxxxx","wechatData":{"purePhoneNumber":"15xxxxxxxxx","phoneNumber":"8615xxxxxxxxx"}}}
 *
 * @apiError code 当有错误返回非1
 * @apiError message 错误信息
 * @apiError error 错误描述
 * @apiErrorExample Error: 500
 * {"code":0,"message":"token error","error":"token error"}
 *
 * @apiError code 当有错误返回非1
 * @apiError message 错误信息
 * @apiError error 错误描述
 * @apiErrorExample Error: 500
 * {"code":0,"message":"get sessionKey failed","error":"get sessionKey failed"}
 *
 * @apiError code 当有错误返回非1
 * @apiError message 错误信息
 * @apiError error 错误描述
 * @apiErrorExample Error: 500
 * {"code":0,"message":"get mobile failed from wechat","error":"get mobile failed from wechat"}
 **/

/**
 * @api {post} /rest/{store_view_code}/V1/applet/saveUnionId c.授权unionid
 * @apiVersion 0.1.0
 * @apiName appletGrantUnionid
 * @apiGroup Lvmh_Customer
 * @apiHeader {String} content-type application/json
 * @apiHeader {String} Authorization 游客：quoteAuth+空格+Token  会员：Bearer+空格+Token
 *
 * @apiDescription
 *
 * 小程序授权获取用户unionid
 *
 * Lvmh_Customer::CustomerInterface->grantMobile
 *
 * @apiParam {String} encryptedData 加密数据
 * @apiParam {String} iv 初始向量（小程序返回）
 * @apiParamExample 请求示例:
 * {"encryptedData":"**********","iv":"XXXXXXXXX"}
 *
 * @apiSuccess {Number} code 成功标识
 * @apiSuccess {String} message 成功信息
 * @apiSuccess {Object} data
 * @apiSuccess {String} data.openid 用户openid
 * @apiSuccess {String} data.unionid 用户unionid
 * @apiSuccess {Object} data.wechatData 用户微信信息
 * @apiSuccess {String} data.wechatData.gender 用户微信信息
 * @apiSuccess {String} data.wechatData.region 用户微信信息
 * @apiSuccess {String} data.wechatData.avatar 用户微信信息
 * @apiSuccess {String} data.wechatData.nickname 用户微信信息
 * @apiSuccessExample 成功响应:
 * {"code":1,"message":"","data":{"openid":"oBsvu4oRgA3FRqKDKfRdJc9JISjI","unionid":"unionid001","wechatData":{"gender":1,"region":"China-Shanghai-","avatar":"https:\/\/thirdwx.qlogo.cn\/mmopen\/vi_32\/DYAIOgq83ert0MzxxFaqqxt6TgicegOsGMn9YOnUlibD8Jib0fngaUqzicmHtpYbzLqFPsRUia4iaC1ymW2ftIbzdiaxw\/132","nickname":"hello world"}}}
 *
 * @apiError code 当有错误返回非1
 * @apiError message 错误信息
 * @apiError error 错误描述
 * @apiErrorExample Error: 500
 * {"code":0,"message":"token error","error":"token error"}
 *
 * @apiError code 当有错误返回非1
 * @apiError message 错误信息
 * @apiError error 错误描述
 * @apiErrorExample Error: 500
 * {"code":0,"message":"save fail","error":"encryptedData or iv is empty."}
 *
 * @apiError code 当有错误返回非1
 * @apiError message 错误信息
 * @apiError error 错误描述
 * @apiErrorExample Error: 500
 * {"code":0,"message":"get unionid failed.","errors":"get unionid failed."}
 **/

/**
 * @api {post} /rest/{store_view_code}/V1/applet/customerSave d.保存用户信息
 * @apiVersion 0.1.0
 * @apiName appletCustomerSave
 * @apiGroup Lvmh_Customer
 * @apiHeader {String} content-type application/json
 * @apiHeader {String} Authorization 如果是会员更新信息使用：Bearer+空格+Token；如果是注册使用quoteAuth+空格+Token
 *
 * @apiDescription
 *
 * 全表单注册和保存用户信息
 *
 * Lvmh_Customer::CustomerInterface->customerSave
 *
 * @apiParam {String} mobile 手机号
 * @apiParam {Number} [verifyCode] 手机验证码,如果手机号是微信授权的不需要验证码，如果是会员中心保存并且手机号没有更改不需要验证码
 * @apiParam {String} [firstname] 名
 * @apiParam {String} [lastname] 姓
 * @apiParam {String} [email] 邮箱
 * @apiParam {String} [homePhone] 固话
 * @apiParam {String} [dob] 生日,格式：2020-12-12
 * @apiParam {Integer} [title] 称谓
 * @apiParam {Integer} [gender] 性别 1：男 2：女 3：保密
 * @apiParam {Integer} [regionId] 省id
 * @apiParam {String} [region] 省,如果regionId设置为必填，此字段也必填
 * @apiParam {Integer} [cityId] 城市id
 * @apiParam {String} [city] 城市，如果cityId设置为必填，此字段也必填
 * @apiParam {Integer} [districtId] 区id
 * @apiParam {String} [district] 区,如果districtId设置为必填，此字段也必填
 * @apiParam {String} [street] 详细地址
 * @apiParam {String} [country] 国家
 * @apiParam {String} [place] 居住地
 * @apiParam {Boolean} [optin] 是否接受推广1：接受  0：不接受
 * @apiParam {String} customerSource 用户来源，小程序传"applet"
 * @apiParam {Integer} [isSendSms]  是否允许发给用户信息 - sms/mms
 * @apiParam {Integer} [isSendPhone] 是否允许发给用户信息 - 手机
 * @apiParam {Integer} [isSendEmail] 是否允许发给用户信息 - 电子邮件
 * @apiParam {Integer} [isSendMail] 是否允许发给用户信息 - 邮件
 * @apiParam {Integer} [isSendSocialMedia] 是否允许发给用户信息 - 网络媒体
 * @apiParam {Integer} [isAnalysis] 是否允许创建，分析用户信息
 * @apiParam {Integer} [isCrossBorder] 是否允许跨境数据传输
 * @apiParamExample 请求示例:
 * {"mobile":"15xxxxxxxxx","verifyCode":"123456","firstname":"xxx","lastname":"xx","dob":"1912-12-16","homePhone":"0","regionId":702,"region":"福建省","cityId":1,"city":"福州市","districtId":1,"district":"鼓楼区","country":"cn","optin":1,"place":"cn","gender":1,"title":"先生","email":"xxx@xx.cn","street":"详细地址"}
 *
 * @apiSuccess {Number} code 成功标识
 * @apiSuccess {String} message 成功信息
 * @apiSuccess {String} [token] 创建新用户的时候返回
 * @apiSuccess {Object} data
 * @apiSuccess {Object} data.customer 用户信息
 * @apiSuccess {Integer} data.customer.id 用户id
 * @apiSuccess {Integer} data.customer.customerId 用户id
 * @apiSuccess {String} data.customer.mobile 用户mobile
 * @apiSuccess {String} data.customer.homePhone 用户固话
 * @apiSuccess {Integer} data.customer.groupId 用户分组id
 * @apiSuccess {String} data.customer.email 用户email
 * @apiSuccess {String} data.customer.openid 用户openid
 * @apiSuccess {String} data.customer.unionid 用户unionid
 * @apiSuccess {String} data.customer.firstname 用户firstname
 * @apiSuccess {String} data.customer.lastname 用户lastname
 * @apiSuccess {String} data.customer.dob 用户生日
 * @apiSuccess {String} data.customer.title 称谓
 * @apiSuccess {Number} data.customer.gender 用户性别，1：男 2：女 3:保密
 * @apiSuccess {String} data.customer.country 用户国家
 * @apiSuccess {String} data.customer.place 用户居住地
 * @apiSuccess {Integer} data.customer.regionId 用户省份id
 * @apiSuccess {String} data.customer.region 用户省份
 * @apiSuccess {Integer} data.customer.cityId 用户城市id
 * @apiSuccess {String} data.customer.city 用户城市
 * @apiSuccess {Integer} data.customer.districtId 用户县区id
 * @apiSuccess {String} data.customer.district 用户县区
 * @apiSuccess {String} data.customer.street 用户详细地址
 * @apiSuccess {Integer} data.customer.optin 是否接收咨询 1：接收 0：不接受
 * @apiSuccess {Integer} data.customer.isSendSms  是否允许发给用户信息 - sms/mms 1 同意 0 拒绝
 * @apiSuccess {Integer} data.customer.isSendPhone 是否允许发给用户信息 - 手机 1 同意 0 拒绝
 * @apiSuccess {Integer} data.customer.isSendEmail 是否允许发给用户信息 - 电子邮件 1 同意 0 拒绝
 * @apiSuccess {Integer} data.customer.isSendMail 是否允许发给用户信息 - 邮件 1 同意 0 拒绝
 * @apiSuccess {Integer} data.customer.isSendSocialMedia 是否允许发给用户信息 - 网络媒体 1 同意 0 拒绝
 * @apiSuccess {Integer} data.customer.isAnalysis 是否允许创建，分析用户信息 1 同意 0 拒绝
 * @apiSuccess {Integer} data.customer.isCrossBorder 是否允许跨境数据传输 1 同意 0 拒绝
 * @apiSuccess {Object} data.config 配置信息
 * @apiSuccess {Boolean} data.config.canChangeMobile 是否可以修改手机号
 * @apiSuccess {Boolean} data.config.canChangeDob 是否可以修改生日
 * @apiSuccessExample 成功响应:
 * {"code":1,"message":"success","data":{"customer":{"id":"11","customerId":"11","groupId":"1","mobile":"15xxxxxxxxx","openid":"oBsvu4oRgA3FRqKDKfRdJc9JISjI","unionid":"unionid001","email":"xxx@xx.cn","homePhone":"0","title":"\u5148\u751f","gender":1,"firstname":"xxx","lastname":"xx","dob":"1912-12-16","country":"cn","place":"cn","regionId":702,"cityId":1,"districtId":1,"region":"\u798f\u5efa\u7701","city":"\u798f\u5dde\u5e02","district":"\u9f13\u697c\u533a","street":"\u8be6\u7ec6\u5730\u5740","optin":1},"config":{"canChangeMobile":true,"canChangeDob":true}}}
 *
 * @apiError code 当有错误返回非1
 * @apiError message 错误信息
 * @apiError error 错误描述
 * @apiErrorExample 手机号已经存在用户
 * {"code":0,"message":"customer already exists","error":"customer already exists"}
 *
 * @apiError code 当有错误返回非1
 * @apiError message 错误信息
 * @apiError error 错误描述
 * @apiErrorExample 字段检验
 * {"code":0,"message":"Please enter a valid home phone."}
 *
 * @apiError code 当有错误返回非1
 * @apiError message 错误信息
 * @apiError error 错误描述
 * @apiErrorExample 不支持更改生日
 * {"code":0,"message":"Not support to change the dob."}
 **/

/**
 * @api {post} /rest/{store_view_code}/V1/customer/flushToken e.刷新用户token

 * @apiVersion 0.1.0
 * @apiName flushCustomerToken
 * @apiGroup Lvmh_Customer
 * @apiHeader {String} content-type application/json
 * @apiHeader {String} Authorization Format: Bearer+空格+Token
 *
 * @apiDescription
 *
 * 刷新token
 *
 * Lvmh_Customer::CustomerInterface->flushToken
 *
 * @apiSuccess {Number} code 成功标识
 * @apiSuccess {String} message 成功信息
 * @apiSuccess {Object} data
 * @apiSuccess {String} data.authType token类型,Bearer
 * @apiSuccess {String} data.token 会员token
 * @apiSuccess {Number} data.expireTime 有效时长（单位: 小时）
 *
 * @apiSuccessExample 成功响应:
 * {"code":1,"message":"Flush Token Success","data":{"authType":"Bearer","token":"2bf8a6wcoij0ov7874ed6ft035i7e9n7","expireTime":"1"}}
 *
 * @apiError code 当有错误返回非1
 * @apiError message 错误信息
 * @apiError error 错误描述
 * @apiErrorExample Error: 500
 * {"code":500,"message":"Get Customer Failed","data":[]}
 **/

/**
 * @api {get} /rest/{store_view_code}/V1/customer/form-config f.用户表单设置

 * @apiVersion 0.1.0
 * @apiName customerFormConfig
 * @apiGroup Lvmh_Customer
 * @apiHeader {String} content-type application/json
 *
 * @apiDescription
 * 获取用户表单设置
 *
 * Lvmh_Customer::CustomerInterface->formConfig
 *
 * @apiParam {Number} [clear] 是否使用缓存 1:不使用， 0:使用
 * @apiParamExample 请求示例:
 * {baseUrl}/rest/{store_view_code}/V1/customer/form-config?clear=1
 *
 * @apiSuccess {Number} code 成功标识
 * @apiSuccess {String} message 成功信息
 * @apiSuccess {Object} data
 * @apiSuccess {Number} data.cached 数据是否来源于缓存 0:否  1:是
 * @apiSuccess {Object[]} data.form 表单数据
 * @apiSuccess {String} data.form.attribute 用户属性，保存用户信息时使用此字段
 * @apiSuccess {String} data.form.label 用户属性label，表单label
 * @apiSuccess {String} data.form.additional 提交此attribute时，附加要提交的字段，目前只有省市区三个字段需要，对应的value为select框的label，如:{"region_id":34,"region":"上海"}
 * @apiSuccess {Boolean} data.form.required 是否必填
 * @apiSuccess {Boolean} data.form.mapping 是否后端提供字典
 * @apiSuccess {Object[]} data.form.mapping_value 如果mapping字段为true,才有此字段
 * @apiSuccess {String} data.form.mapping_value.value select框value
 * @apiSuccess {String} data.form.mapping_value.label select框label
 * @apiSuccessExample 成功响应:
 * {"code":1,"message":"","data":{"cached":0,"form":[{"attribute":"home_phone","label":"\u56fa\u8bdd","additional":"","required":false,"mapping":false},{"attribute":"email","label":"\u90ae\u7bb1","additional":"","required":true,"mapping":false},{"attribute":"dob","label":"\u751f\u65e5","additional":"","required":false,"mapping":false},{"attribute":"title","label":"\u79f0\u8c13","additional":"","required":true,"mapping":true,"mapping_value":[{"value":null,"label":"\u8bf7\u9009\u62e9"},{"value":"miss","label":"\u5c0f\u59d0"},{"value":"mr","label":"\u5148\u751f"},{"value":"mrs","label":"\u5973\u58eb"},{"value":"secret","label":"\u4fdd\u5bc6"}]},{"attribute":"gender","label":"\u6027\u522b","additional":"","required":true,"mapping":true,"mapping_value":[{"value":"1","label":"\u7537"},{"value":"2","label":"\u5973"},{"value":"3","label":"\u4fdd\u5bc6"}]},{"attribute":"country","label":"\u56fd\u7c4d","additional":"","required":true,"mapping":true,"mapping_value":[{"value":"cn","label":"\u4e2d\u56fd"},{"value":"usa","label":"\u7f8e\u56fd"}]},{"attribute":"place","label":"\u5c45\u4f4f\u5730","additional":"","required":false,"mapping":true,"mapping_value":[{"value":"cn","label":"\u4e2d\u56fd"},{"value":"japan","label":"\u65e5\u672c"}]},{"attribute":"region_id","label":"\u7701","additional":"region","required":false,"mapping":false},{"attribute":"city_id","label":"\u5e02","additional":"city","required":false,"mapping":false},{"attribute":"district_id","label":"\u533a","additional":"district","required":false,"mapping":false},{"attribute":"street","label":"\u8857\u9053","additional":"","required":false,"mapping":false},{"attribute":"optin","label":"\u662f\u5426\u63a5\u53d7\u54a8\u8be2","additional":"","required":false,"mapping":false}]}}
 *
 * @apiError code 当有错误返回非1
 * @apiError message 错误信息
 * @apiErrorExample Error: 500
 * {"code":0,"message":"no config customer form"}
 **/


/**
 * @api {post} /rest/{store_view_code}/V1/applet/customerInfo g.获取会员信息
 * @apiVersion 0.1.0
 * @apiName appletCustomerInfo
 * @apiGroup Lvmh_Customer
 * @apiHeader {String} content-type application/json
 * @apiHeader {String} Authorization Bearer+会员token
 *
 * @apiDescription
 *
 * 通过token获取会员信息
 *
 * Lvmh_Customer::CustomerInterface->customerInfo
 *
 * @apiSuccess {Number} code 成功标识
 * @apiSuccess {String} message 成功信息
 * @apiSuccess {Object} data
 * @apiSuccess {Integer} data.id 用户id
 * @apiSuccess {Integer} data.customerId 用户id
 * @apiSuccess {String} data.mobile 用户mobile
 * @apiSuccess {String} data.homePhone 用户固话
 * @apiSuccess {Integer} data.groupId 用户分组id
 * @apiSuccess {String} data.email 用户email
 * @apiSuccess {String} data.firstname 用户firstname
 * @apiSuccess {String} data.lastname 用户lastname
 * @apiSuccess {String} data.dob 用户生日
 * @apiSuccess {String} data.title 称谓
 * @apiSuccess {Number} data.gender 用户性别，1：男 2：女 3:保密
 * @apiSuccess {String} data.country 用户国家
 * @apiSuccess {String} data.place 用户居住地
 * @apiSuccess {Integer} data.regionId 用户省份id
 * @apiSuccess {String} data.region 用户省份
 * @apiSuccess {Integer} data.cityId 用户城市id
 * @apiSuccess {String} data.city 用户城市
 * @apiSuccess {Integer} data.districtId 用户县区id
 * @apiSuccess {String} data.district 用户县区
 * @apiSuccess {String} data.street 用户详细地址
 * @apiSuccess {Integer} data.optin 是否接收咨询 1：接收 0：不接受
 * @apiSuccess {Object} data.wechatData 微信信息
 * @apiSuccess {Integer} data.isSendSms  是否允许发给用户信息 - sms/mms 1 同意 0 拒绝
 * @apiSuccess {Integer} data.isSendPhone 是否允许发给用户信息 - 手机 1 同意 0 拒绝
 * @apiSuccess {Integer} data.isSendEmail 是否允许发给用户信息 - 电子邮件 1 同意 0 拒绝
 * @apiSuccess {Integer} data.isSendMail 是否允许发给用户信息 - 邮件 1 同意 0 拒绝
 * @apiSuccess {Integer} data.isSendSocialMedia 是否允许发给用户信息 - 网络媒体 1 同意 0 拒绝
 * @apiSuccess {Integer} data.isAnalysis 是否允许创建，分析用户信息 1 同意 0 拒绝
 * @apiSuccess {Integer} data.isCrossBorder 是否允许跨境数据传输，分析用户信息 1 同意 0 拒绝
 * @apiSuccess {String} data.wechatData.gender 微信性别
 * @apiSuccess {String} data.wechatData.region 微信地址
 * @apiSuccess {String} data.wechatData.avatar 微信头像
 * @apiSuccess {String} data.wechatData.nickname 微信昵称
 * @apiSuccess {String} data.wechatData.openid 用户openid
 * @apiSuccess {String} data.wechatData.unionid 用户unionid
 * @apiSuccess {Object} data.config
 * @apiSuccess {bool} data.config.canChangeMobile 是否可以修改手机号
 * @apiSuccess {bool} data.config.canChangeDob 是否可以修改生日
 * * @apiSuccessExample 成功响应:
 * {"code":1,"message":"","data":{"id":"18","customerId":"18","groupId":"1","mobile":"1512122222","openid":null,"unionid":null,"email":null,"homePhone":"02111111111","title":"\u5148\u751f","gender":"1","firstname":"su\u4e2dn","lastname":"\u5927\u5bb6\u5f00\u53d1\u5927\u5bb6\u53d1\u963f\u5a07\u554a\u8001\u5730\u8001\u7684\u7a7a\u554a\u963f\u80f6\u5f00\u53d1\u770b","dob":"1922-12-16","country":"cn","place":"cn","regionId":"702","cityId":"1","districtId":"1","region":"\u798f\u5efa\u7701","city":"\u798f\u5dde\u5e02","district":"\u9f13\u697c\u533a","street":"\u5927\u5bb6\u5f00\u53d1\u5927\u5bb6\u53d1\u963f\u5a07\u554a\u8001\u5730\u65b9\u89c1\u554a\u4e24\u4f4d\u6559\u7ec3\u5496\u524b\u6d6a\u8d39\u53ef\u80fd\u554a\u554a\u5c31\u53d1\u5b8c\u989d\u653e\u5047\u554a\u963f\u80f6\u5f00\u53d1\u770b","optin":"1","wechatData":{"openId":"o5fVc5JVM6Jlm23ERmpiF1mHmXXU","unionId":null,"gender":"1","region":"sadfa","avatar":"wa","nickname":"adfa"},"config":{"canChangeMobile":true,"canChangeDob":false}}}
 *
 * @apiError code 当有错误返回非1
 * @apiError message 错误信息
 * @apiError error 错误描述
 * @apiError data
 * @apiError data.code 微信code
 * @apiErrorExample Error: 500
 * {"code":0,"message":"customer id is failed"}
 **/

/**
 * @api {post} /rest/{store_view_code}/V1/applet/customerDelete g1.删除会员信息
 * @apiVersion 0.1.0
 * @apiName appletCustomerDelete
 * @apiGroup Lvmh_Customer
 * @apiHeader {String} content-type application/json
 * @apiHeader {String} Authorization Bearer+会员token
 *
 * @apiDescription
 *
 * 通过token删除会员信息
 *
 * Lvmh_Customer::CustomerInterface->customerDelete
 *
 * @apiSuccess {Number} code 成功标识
 * @apiSuccess {String} message 成功信息
 * * @apiSuccessExample 成功响应:
 * {"code":1,"message":"Delete customer success."}
 *
 * @apiError code 当有错误返回非1
 * @apiError message 错误信息
 * @apiError error 错误描述
 * @apiErrorExample Error: 500
 * {"code":0,"message":"customer id is failed"}
 **/


/**
 * @api {post} /rest/{store_view_code}/V1/customer/address/list h.收货地址列表
 * @apiVersion 0.1.0
 * @apiName addressList
 * @apiGroup Lvmh_Customer
 *
 * @apiDescription
 * 地址列表
 *
 * Lvmh\Customer\Model\Api\AddressInterface->getList
 *
 *
 * @apiHeader {String} Accept application/json
 * @apiHeader {String} Authorization Format: Bearer+空格+Token Code
 *
 * @apiSuccess {Number} code 1
 * @apiSuccess {String} message 消息
 * @apiSuccess {Object} data 地址信息
 * @apiSuccess {Object} data.total 地址数量
 * @apiSuccess {Object[]} data.items
 * @apiSuccess {Number} data.items.id 地址ID
 * @apiSuccess {String} data.items.firstname 收件人姓名1
 * @apiSuccess {String} data.items.lastname 收件人姓名2
 * @apiSuccess {String} data.items.street 街道地址
 * @apiSuccess {String} data.items.city 城市
 * @apiSuccess {String} data.items.city_id 城市ID
 * @apiSuccess {String} data.items.district 区
 * @apiSuccess {String} data.items.district_id 区ID
 * @apiSuccess {String="CN"} data.items.country_id 国家编号
 * @apiSuccess {String} data.items.region 省
 * @apiSuccess {String} data.items.region_id 省ID
 * @apiSuccess {String} data.items.postcode 邮编
 * @apiSuccess {String} data.items.telephone 收件人电话
 * @apiSuccess {String} data.fax 收件人传真
 * @apiSuccess {Boolean} data.items.isDefault 是否默认地址
 *
 * @apiSuccessExample Error-Response:  200
 * {"code":1,"message":"\u64cd\u4f5c\u6210\u529f","data":{"total":10,"items":[{"id":"5","isDefault":true,"firstname":"a","lastname":"a","gender":"1","street":"\u5927\u5bb6\u5f00\u53d1\u5927\u5bb6\u53d1\u963f\u5a07\u554a\u8001\u5730\u65b9\u89c1\u554a\u4e24\u4f4d\u6559\u7ec3\u5496\u5561\u673a\u7684\u65f6\u523b\u653e\u5047\u554a\u963f\u4f1f\u653e\u5047\u554a","city":"\u4e0a\u6d77\u5e02","city_id":"123","country_id":"CN","region":"\u4e0a\u6d77","region_id":714,"district":"\u9752\u6d66\u533a","district_id":"1156","postcode":"432440","telephone":"15121105671","fax":null},{"id":"2","isDefault":false,"firstname":"he","lastname":"he","gender":"1","street":"\u897f\u85cf\u4e2d\u8def525\u53f7\u7b2c\u4e00\u79d2\u7535\u5546","city":"\u5b81\u5fb7\u5e02","city_id":"2","country_id":"CN","region":"\u798f\u5efa\u7701","region_id":702,"district":"\u53f0\u6c5f\u533a","district_id":"2","postcode":"432440","telephone":"15121105671","fax":null},{"id":"3","isDefault":false,"firstname":"he","lastname":"he","gender":"1","street":"\u897f\u85cf\u4e2d\u8def525\u53f7\u7b2c\u4e00\u79d2\u7535\u5546","city":"\u4e0a\u6d77\u5e02","city_id":"123","country_id":"CN","region":"\u4e0a\u6d77","region_id":714,"district":"\u957f\u5b81\u533a","district_id":"1144","postcode":"432440","telephone":"15121105671","fax":null},{"id":"4","isDefault":false,"firstname":"he","lastname":"he","gender":"1","street":"\u5bf0\u56fe","city":"\u4e0a\u6d77\u5e02","city_id":"123","country_id":"CN","region":"\u4e0a\u6d77","region_id":714,"district":"\u9ec4\u6d66\u533a","district_id":"1142","postcode":"432440","telephone":"15121105671","fax":null},{"id":"12","isDefault":false,"firstname":"s","lastname":"a","gender":"1","street":"\u5927\u5bb6\u5f00\u53d1\u5927\u5bb6\u53d1\u963f\u5a07\u554a\u8001\u5730\u65b9\u89c1\u554a\u4e24\u4f4d\u6559\u7ec3\u5496\u5561\u673a\u7684\u65f6\u523b\u653e\u5047\u554a\u963f\u4f1f\u653e\u5047\u554a","city":"\u4e0a\u6d77\u5e02","city_id":"123","country_id":"CN","region":"\u4e0a\u6d77","region_id":714,"district":"\u9752\u6d66\u533a","district_id":"1156","postcode":"432440","telephone":"15121105671","fax":null},{"id":"13","isDefault":false,"firstname":"s","lastname":"a","gender":"1","street":"\u5927\u5bb6\u5f00\u53d1\u5927\u5bb6\u53d1\u963f\u5a07\u554a\u8001\u5730\u65b9\u89c1\u554a\u4e24\u4f4d\u6559\u7ec3\u5496\u5561\u673a\u7684\u65f6\u523b\u653e\u5047\u554a\u963f\u4f1f\u653e\u5047\u554a","city":"\u4e0a\u6d77\u5e02","city_id":"123","country_id":"CN","region":"\u4e0a\u6d77","region_id":714,"district":"\u9752\u6d66\u533a","district_id":"1156","postcode":"432440","telephone":"15121105671","fax":null},{"id":"14","isDefault":false,"firstname":"s","lastname":"a","gender":"1","street":"\u5927\u5bb6\u5f00\u53d1\u5927\u5bb6\u53d1\u963f\u5a07\u554a\u8001\u5730\u65b9\u89c1\u554a\u4e24\u4f4d\u6559\u7ec3\u5496\u5561\u673a\u7684\u65f6\u523b\u653e\u5047\u554a\u963f\u4f1f\u653e\u5047\u554a","city":"\u4e0a\u6d77\u5e02","city_id":"123","country_id":"CN","region":"\u4e0a\u6d77","region_id":714,"district":"\u9752\u6d66\u533a","district_id":"1156","postcode":"432440","telephone":"15121105671","fax":null},{"id":"15","isDefault":false,"firstname":"s","lastname":"a","gender":"1","street":"\u5927\u5bb6\u5f00\u53d1\u5927\u5bb6\u53d1\u963f\u5a07\u554a\u8001\u5730\u65b9\u89c1\u554a\u4e24\u4f4d\u6559\u7ec3\u5496\u5561\u673a\u7684\u65f6\u523b\u653e\u5047\u554a\u963f\u4f1f\u653e\u5047\u554a","city":"\u4e0a\u6d77\u5e02","city_id":"123","country_id":"CN","region":"\u4e0a\u6d77","region_id":714,"district":"\u9752\u6d66\u533a","district_id":"1156","postcode":"432440","telephone":"15121105671","fax":null},{"id":"16","isDefault":false,"firstname":"s","lastname":"a","gender":"1","street":"\u5927\u5bb6\u5f00\u53d1\u5927\u5bb6\u53d1\u963f\u5a07\u554a\u8001\u5730\u65b9\u89c1\u554a\u4e24\u4f4d\u6559\u7ec3\u5496\u5561\u673a\u7684\u65f6\u523b\u653e\u5047\u554a\u963f\u4f1f\u653e\u5047\u554a","city":"\u4e0a\u6d77\u5e02","city_id":"123","country_id":"CN","region":"\u4e0a\u6d77","region_id":714,"district":"\u9752\u6d66\u533a","district_id":"1156","postcode":"432440","telephone":"15121105671","fax":null},{"id":"17","isDefault":false,"firstname":"s","lastname":"a","gender":"1","street":"\u5927\u5bb6\u5f00\u53d1\u5927\u5bb6\u53d1\u963f\u5a07\u554a\u8001\u5730\u65b9\u89c1\u554a\u4e24\u4f4d\u6559\u7ec3\u5496\u5561\u673a\u7684\u65f6\u523b\u653e\u5047\u554a\u963f\u4f1f\u653e\u5047\u554a","city":"\u4e0a\u6d77\u5e02","city_id":"123","country_id":"CN","region":"\u4e0a\u6d77","region_id":714,"district":"\u9752\u6d66\u533a","district_id":"1156","postcode":"432440","telephone":"15121105671","fax":null}]}}
 *
 */

/**
 * @api {post} /rest/{store_view_code}/V1/customer/address/save i.更新与新增收货地址
 * @apiVersion 0.1.0
 * @apiName addAddress
 * @apiGroup Lvmh_Customer
 *
 * @apiDescription
 * 更新与新增收货地址
 *
 * Lvmh\Customer\Model\Api\AddressInterface->save
 *
 * @apiHeader {String} Accept application/json
 * @apiHeader {String} Authorization Format: Bearer+空格+Token Code
 *
 * @apiParam {Number} [id] 地址薄ID
 * @apiParam {Object} data
 * @apiParam {String} data.firstname 收件人姓名1
 * @apiParam {int} data.gender 性别 1 男 2 女
 * @apiParam {String} data.street 街道地址
 * @apiParam {String} data.city 城市
 * @apiParam {int} data.city_id 城市ID
 * @apiParam {String="CN"} data.country_id 国家编号
 * @apiParam {String} data.region 省
 * @apiParam {int} data.region_id 省ID
 * @apiParam {String} data.district 区
 * @apiParam {int} data.district_id 区ID
 * @apiParam {String} data.postcode 邮编
 * @apiParam {String} data.telephone 收件人电话
 * @apiParam {Boolean} data.isDefault 是否默认地址
 * @apiParamExample {json} Request-Example:
 * {"data":{"firstname":"jhon","lastname":"Deo12","street":"xxxx","city_id":"123","city":"xxxxx","country_id":"CN","postcode":"43244","districtId":11,"region":"mmm","gender":1,"telephone":15618883310,"region_id":1,"isDefault":true},"id":5}
 *
 * @apiSuccess {Number} code 1
 * @apiSuccess {String} message 消息
 * @apiSuccess {Object} data  应用或者新增的地址
 * @apiSuccess {Object} data.address  应用或者新增的地址
 * @apiSuccess {int} data.address.id  传入的地址ID或者新增的地址ID
 * @apiSuccess {int} data.address.customerAddressId  传入的地址ID或者新增的地址ID
 * @apiSuccess {String} data.address.firstname 收件人姓名1
 * @apiSuccess {int} data.address.gender 性别
 * @apiSuccess {String} data.address.street 街道地址
 * @apiSuccess {String} data.address.city 城市
 * @apiSuccess {String} data.address.city_id 城市ID
 * @apiSuccess {String="CN"} data.address.country_id 国家编号
 * @apiSuccess {String} data.address.region 省
 * @apiSuccess {String} data.address.region_id 省ID
 * @apiSuccess {String} data.address.district 区
 * @apiSuccess {String} data.address.district_id 区ID
 * @apiSuccess {String} data.address.postcode 邮编
 * @apiSuccess {String} data.address.telephone 收件人电话
 * @apiSuccess {Boolean} data.address.isDefault 是否默认地址
 *
 * @apiError code 非1
 * @apiError message 错误提示
 * @apiErrorExample Error-Response: 401
 * {"code":0,"message":"请先登录"}
 *
 * @apiError code 非1
 * @apiError message 错误提示
 * @apiErrorExample Error-Response: 500
 * {"code":0,"message":"\u8bf7\u8f93\u5165\u6b63\u786e\u7684\u624b\u673a\u53f7\u7801"}
 *
 * @apiSuccess {Number} code 1
 * @apiSuccess {String} message
 * @apiSuccessExample 成功响应: 200
 * {"code":1,"message":"\u64cd\u4f5c\u6210\u529f","data":{"address":{"id":5,"isDefault":true,"firstname":"a","lastname":"a","gender":1,"street":"adaf","city":"\u4e0a\u6d77\u5e02","city_id":"123","country_id":"CN","region":"\u4e0a\u6d77","region_id":714,"district":"\u957f\u5b81\u533a","district_id":1156,"postcode":"432440","telephone":"15000000000","fax":null,"customerAddressId":5}}}
 */

/**
 * @api {post} /rest/{store_view_code}/V1/customer/address/delete/:id j.删除收货地址
 * @apiVersion 0.1.0
 * @apiName delAddress
 * @apiGroup Lvmh_Customer
 *
 * @apiDescription
 * 删除收货地址
 *
 * Lvmh\Customer\Model\Api\AddressInterface->delete
 *
 * @apiHeader {String} Accept application/json
 * @apiHeader {String} Authorization Format: Bearer+空格+Token Code
 *
 * @apiParam {Number} id 地址薄ID
 *
 * @apiSuccess {Number} code 1
 * @apiSuccess {String} message 消息
 * @apiSuccessExample Success-Response:
 * {"code":1,"message":"Delete address success."}
 *
 * @apiError code 非1
 * @apiError message 有错误返回此标识
 * @apiErrorExample Error-Response: 500
 * {"code":0,"message":"\u9ed8\u8ba4\u5730\u5740\u4e0d\u5141\u8bb8\u5220\u9664"}
 */
