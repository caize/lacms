<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>管理员-登录</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="/assets/css/animate.min.css" rel="stylesheet" />
	<link href="/assets/css/style.min.css" rel="stylesheet" />
	<link href="/assets/css/style-responsive.min.css" rel="stylesheet" />
	<link href="/assets/css/theme/default.css" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->
</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<div class="login-cover">
	    <div class="login-cover-image"><img src="/assets/img/login-bg/bg-1.jpg" data-id="login-cover-image" alt="" /></div>
	    <div class="login-cover-bg"></div>
	</div>
	<!-- begin #page-container -->
	<div id="page-container" class="fade">
	    <!-- begin login -->
        <div class="login login-v2" data-pageload-addclass="animated flipInX">
            <!-- begin brand -->
            <div class="login-header">
                <div class="brand">
                    <span class="logo"></span> 后台管理系统
                </div>
                <div class="icon">
                    <i class="fa fa-sign-in"></i>
                </div>
            </div>
            <!-- end brand -->
            <div class="login-content" id="vueLogin">
                <validator name="LoginValidation">
                <form  method="POST" class="margin-bottom-0" novalidate>
                    <div class="form-group m-b-20">
                        <input 
                            type="text" 
                            class="form-control input-lg" 
                            placeholder="邮  箱" 
                            name="email" 
                            v-model="user.email" 
                            v-validate:email="{required: true}" />
                    </div>
                    <div class="form-group m-b-20">
                        <input 
                            type="password" 
                            class="form-control input-lg" 
                            placeholder="密  码" 
                            name="password" 
                            v-model="user.password"
                            v-validate:password="{ required: true,minlength:6,maxlength:11}"/>
                    </div>
                    <div class="login-buttons">
                        <button type="button" class="btn btn-success btn-block btn-lg" @click="login()" :disabled="$LoginValidation.invalid">登   录</button>
                    </div>
                    <div class="m-t-20" v-show="msg">
                        <span v-text="msg"></span>
                    </div>
                    <div class="m-t-20" v-if="msgData.length > 0">
                        <p v-text="v.msg" v-for="v in msgData"></p>
                    </div>
                </form>
                </validator>
            </div>
        </div>
        <!-- end login -->
        
        <ul class="login-bg-list">
            <li class="active"><a href="#" data-click="change-bg"><img src="/assets/img/login-bg/bg-1.jpg" alt="" /></a></li>
            <li><a href="#" data-click="change-bg"><img src="/assets/img/login-bg/bg-2.jpg" alt="" /></a></li>
            <li><a href="#" data-click="change-bg"><img src="/assets/img/login-bg/bg-3.jpg" alt="" /></a></li>
            <li><a href="#" data-click="change-bg"><img src="/assets/img/login-bg/bg-4.jpg" alt="" /></a></li>
            <li><a href="#" data-click="change-bg"><img src="/assets/img/login-bg/bg-5.jpg" alt="" /></a></li>
            <li><a href="#" data-click="change-bg"><img src="/assets/img/login-bg/bg-6.jpg" alt="" /></a></li>
        </ul>
        
        <!-- begin theme-panel -->
        <div class="theme-panel">
            <a href="javascript:;" data-click="theme-panel-expand" class="theme-collapse-btn"><i class="fa fa-cog"></i></a>
            <div class="theme-panel-content">
                <h5 class="m-t-0">Color Theme</h5>
                <ul class="theme-list clearfix">
                    <li class="active"><a href="javascript:;" class="bg-green" data-theme="default" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Default">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-red" data-theme="red" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Red">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-blue" data-theme="blue" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Blue">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-purple" data-theme="purple" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Purple">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-orange" data-theme="orange" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Orange">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-black" data-theme="black" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Black">&nbsp;</a></li>
                </ul>
                <div class="divider"></div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">Header Styling</div>
                    <div class="col-md-7">
                        <select name="header-styling" class="form-control input-sm">
                            <option value="1">default</option>
                            <option value="2">inverse</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label">Header</div>
                    <div class="col-md-7">
                        <select name="header-fixed" class="form-control input-sm">
                            <option value="1">fixed</option>
                            <option value="2">default</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">Sidebar Styling</div>
                    <div class="col-md-7">
                        <select name="sidebar-styling" class="form-control input-sm">
                            <option value="1">default</option>
                            <option value="2">grid</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label">Sidebar</div>
                    <div class="col-md-7">
                        <select name="sidebar-fixed" class="form-control input-sm">
                            <option value="1">fixed</option>
                            <option value="2">default</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">Sidebar Gradient</div>
                    <div class="col-md-7">
                        <select name="content-gradient" class="form-control input-sm">
                            <option value="1">disabled</option>
                            <option value="2">enabled</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">Content Styling</div>
                    <div class="col-md-7">
                        <select name="content-styling" class="form-control input-sm">
                            <option value="1">default</option>
                            <option value="2">black</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-12">
                        <a href="#" class="btn btn-inverse btn-block btn-sm" data-click="reset-local-storage"><i class="fa fa-refresh m-r-3"></i> Reset Local Storage</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end theme-panel -->
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="/assets/plugins/jquery/jquery-1.9.1.min.js"></script>
	<script src="/assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
	<script src="/assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
	<script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!--[if lt IE 9]>
		<script src="/assets/crossbrowserjs/html5shiv.js"></script>
		<script src="/assets/crossbrowserjs/respond.min.js"></script>
		<script src="/assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="/assets/plugins/jquery-cookie/jquery.cookie.js"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="/assets/js/login-v2.demo.min.js"></script>
	<script src="/assets/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->

    <!-- ================== Vue JS ================== -->
	<script src="/vue/vue.js"></script>
    <script src="/vue/vue-validator.js"></script>
    <script src="/vue/vue-resource.js"></script>
	<!-- ================== END vue JS ================== -->
	<script>
		$(document).ready(function() {
            App.init();
            LoginV2.init();
        });
        $('body').keydown(function(e){
            if(e.which == 13){
                vn.login();
            }
        });
        var vn = new Vue({
            el: '#vueLogin',
            data: {
                user:{_token:"{{csrf_token()}}"},
                msgData:[],
                msg:''
            },
            methods: {
                login:function(){
                    this.msgData = [];
                    this.$http.post("{{ url('/admin/login') }}",this.user).then(function (response) {
                        if(response.data.code == 400){
                            this.msg = response.data.message
                        }
                        if(response.data.code == 200){
                            window.location.href = "{{ url('/admin') }}";
                        }
                        console.log(response)
                    }, function (response) {
                        if(response.status == 422){
                           for (var key in response.data) {
                                this.msgData.push({msg:response.data[key][0]})
                           }
                        }
                    }).catch(function(response) {
                        console.log(response)
                    });
                }
            }
        });
	</script>
</body>
</html>
