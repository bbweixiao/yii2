<?php

/* @var $this yii\web\View */

$this->title = '首页';
?>

<section class="content-header  " style="background-color: white;margin-top: -15px;margin-left: -12px;margin-right: -15px">
        最新通知：&nbsp&nbsp&nbsp 无消息 &nbsp&nbsp&nbsp<a> 更多>></a>
</section>
<section class="content">
    <div class="row" >
        <div class="col-md-8">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">今日简报</h3>
                </div>
                <div class="box-body">
                    <table class="table">
                        <tbody><tr style="background-color: white">
                            <th ></th>
                            <th>订货单</th>
                            <th>订货金额</th>
                            <th>退货单</th>
                            <th>退货金额</th>
                            <th>毛利润 </th>
                        </tr>
                        <tr>
                            <td>今日</td>
                            <td>0笔</td>
                            <td>￥0.00</td>
                            <td>0笔</td>
                            <td>￥0.00</td>
                            <td>￥0.00</td>
                        </tr>
                        <tr>
                            <td>本月</td>
                            <td>2笔</td>
                            <td>￥100.00</td>
                            <td>0笔</td>
                            <td>￥0.00 </td>
                            <td>￥0.00 </td>
                        </tr>
                        <tr>
                            <td>本年</td>
                            <td>4笔</td>
                            <td>￥200.00</td>
                            <td>0笔</td>
                            <td>￥0.00</td>
                            <td>￥0.00 </td>
                        </tr>
                        </tbody></table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">待处理订单</h3>
                </div>
                <div class="box-body">

                    <div class="box-body">订货单：<span class="font20">0</span> 笔<span class="pull-right font14">￥0.00</span></div>
                    <div class="box-body"></div>
                    <div class="box-body" ></div>
                    <div class="box-body">订货单：<span class="font20">0</span> 笔<span class="pull-right font14">￥0.00</span></div>
                    <div class="box-body"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" >
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">业务简报</h3>
                    <div class=" pull-right">
                        <label for="month"><input type="radio" name="highchart" id="month" value="1">&nbsp;月　</label>
                        <label for="halfyear"><input type="radio" name="highchart" id="halfyear" value="2">&nbsp;半年　</label>
                        <label for="year"><input type="radio" name="highchart" id="year" value="3">&nbsp;年</label>
                    </div>
                </div>
                <div class="box-header">
                <div class=" pull-right" >
                        <label for="year">订单金额（元）</label>
                </div>
                </div>
                <div class="box-body">
                    <div class="box ">
                        <div class="box-body chart-responsive">
                            <div class="chart" id="line-chart" style="height: 300px;"></div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(function () {
        "use strict";
        var line = new Morris.Line({
            element: 'line-chart',
            resize: true,
            data: [
                {y: '2011 Q1', item1: 2666},
                {y: '2011 Q2', item1: 2778},
                {y: '2011 Q3', item1: 4912},
                {y: '2011 Q4', item1: 3767},
                {y: '2012 Q1', item1: 6810},
                {y: '2012 Q2', item1: 5670},
                {y: '2012 Q3', item1: 4820},
                {y: '2012 Q4', item1: 15073},
                {y: '2013 Q1', item1: 10687},
                {y: '2013 Q2', item1: 8432}
            ],
            xkey: 'y',
            ykeys: ['item1'],
            labels: ['Item 1'],
            lineColors: ['#3c8dbc'],
            hideHover: 'auto'
        });
    });
</script>
