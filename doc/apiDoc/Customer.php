<?php
/**
 * Blog
 */

/**
 * @apiDefine User  用户::loginController
 */

/**
 * @api {post} /login 登录获取token
 * @apiVersion 0.1.0
 * @apiName login
 * @apiGroup LoginController
 * @apiHeader {String} content-type application/json
 *
 * @apiDescription
 *
 * 后台用户登录，并获取token
 *
 * LoginController::login
 *
 * @apiParam {String} user 用户名
 * @apiParam {String} password 密码
 * @apiParamExample 请求示例:
 * {"user":"admin","password":"admin1111"}
 *
 * @apiSuccess {Number} code 成功标识
 * @apiSuccess {String} message 成功信息
 * @apiSuccess {Object} data
 * @apiSuccess {String} data.authType token类型,取值范围 user:后台用户 customer:登陆用户
 * @apiSuccess {String} data.token 用户 token
 * @apiSuccessExample 成功响应:
 * {"code":200,"message":"login success","data":{"token":"sfafsafsdffdfsfsf","authType":"user"}}
 *
 * @apiError code 当有错误返回非200
 * @apiError message 错误信息
 * @apiError error 错误描述
 * @apiErrorExample Error: 400
 * {"code":400,"message":"login error","data":[]}
 **/
