@extends('layouts.admin') @section('style')
<style>
    .input {
        width: 500px;
    }
    
    .bootstrap-select.form-control:not([class*="span"]) {
        width: 500px;
    }
</style>
@endsection @section('content')
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">权限管理</a></li>
        <li><a href="javascript:;">权限列表</a></li>
        <li class="active">权限添加</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">权限管理<small>...</small></h1>
    <!-- begin row -->
    <div class="row">
        <!-- begin col-12 -->
        <div class="col-12">
            <!-- begin panel -->
            <div class="panel panel-inverse" data-sortable-id="form-stuff-5">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">权限添加</h4>
                </div>
                <div class="panel-body" id="node">
                    <validator name="nodeValidation">
                        <form class="form-horizontal" novalidate method="POST">
                            <fieldset>
                                <legend></legend>
                                <div class="form-group">
                                    <label class="col-md-3 control-label ">上级权限:</label>
                                    <div class="col-md-9">
                                        <select class="form-control selectpicker input" v-model="p.parent_id" data-size="10" data-live-search="true" data-style="btn-white">
                                        <option value="0" selected>顶级权限</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">权限别名:</label>
                                    <div class="col-md-9">
                                        <input type="text" v-model="p.name" name="name" v-validate:name="{ required: true}" class="form-control input" placeholder="权限别名,如(admin.permission.index)">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">权限名:</label>
                                    <div class="col-md-9">
                                        <input type="text" v-model="p.display_name" name="displayName" v-validate:displayName="{ required: true}" class="form-control input" placeholder="权限名">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="message">简要描述:</label>
                                    <div class="col-md-9">
                                        <textarea v-model="p.description" name="description" v-validate:description="{ required: true}" class="form-control input" id="message" name="message" rows="4" data-parsley-range="[20,200]"
                                            placeholder="这里填写当前权限的简要描述"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">权限排序:</label>
                                    <div class="col-md-9">
                                        <input type="text" v-model="p.sort" name="sort" v-validate:sort="{ required: true}" class="form-control input" placeholder="排序号">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">是否是菜单:</label>
                                    <div class="col-md-9">
                                        <input type="checkbox" v-model="p.is_menu"  data-render="switchery" data-theme="default"  />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-9 col-md-offset-3">
                                        <button @click="addNode()" :disabled="$nodeValidation.invalid" type="button" class="btn btn-success btn-lg m-r-5" style="width: 100px">保 存</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </validator>
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-6 -->
    </div>
    <!-- end row -->
</div>
@endsection @section('my-js')
<script>
	$(document).ready(function() {
		App.init();
        FormPlugins.init();
        FormSliderSwitcher.init();
	});
    var vn = new Vue({
        el: '#node',
        data: {
            p:{_token:"{{csrf_token()}}"},
            msg:''
        },
        methods: {
            addNode:function(){
                console.log(this.p)
            }
        }
    });
</script> @endsection