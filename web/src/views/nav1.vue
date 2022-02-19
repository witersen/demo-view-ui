<template>
  <Card :bordered="false" :dis-hover="true">
    <Row type="flex" justify="end">
      <Col span="18"> </Col>
      <Col span="6">
        <Input
          search
          enter-button="搜索"
          placeholder="输入关键字搜索..."
          style="margin-bottom: 15px; width: 315px"
      /></Col>
    </Row>
    <Table :columns="columns1" :data="data1"></Table>

    <!-- <Table style="margin-top:50px" :columns="columns1" :data="data1"></Table> -->
  </Card>
</template>

<script>
export default {
  data() {
    return {
      /**
       * 分页数据
       */
      current: 1,
      pageSize: 10,
      total: 20,

      columns1: [
        {
          title: "Name",
          key: "userName",
        },
        {
          title: "Age",
          key: "userAge",
        },
        {
          title: "Address",
          key: "userAddress",
        },
      ],
      data1: [
        // {
        //   userName: "John Brown",
        //   userAge: 18,
        //   userAddress: "New York No. 1 Lake Park",
        // },
        // {
        //   userName: "John Brown",
        //   userAge: 18,
        //   userAddress: "New York No. 1 Lake Park",
        // },
      ],
    };
  },
  methods: {
    //从后端获取用户列表
    GetUserList() {
      //网络请求使用axios
      var that = this;
      var data = {};
      //由于我们的后端接口文件 api.php等和前端打包后的文件处于同一个网站目录下 所以 /api.php的方式可以直接访问接口 不存在跨域文件
      //如果后端接口服务与前端服务不在同一个域 则要进行跨域问题的处理 
      //处理跨域问题 可以使用nginx服务器进行配置 同时也要保证前后端项目工程配置了相关的允许跨域配置
      //由于本例没有存在跨域请求问题 所以不对跨域案例进行展示
      that.$axios
        .post("/api.php?c=user&a=GetUserList", data) //其中c=user代表请求处理的控制器为user a=GetUserList 代表请求处理的函数为控制器user下的GetUserList函数
        .then(function (response) {
          var result = response.data;
          //返回结果中的status为1时候代表请求正常 status字段为后端自定义
          if (result.status == 1) {
            //赋值
            //为表格数据赋值
            that.data1 = result.data;
            //成功提示
            that.$Message.success(result.message);

            //以上的status字段 data字段 message字段 都为后端返回 用户可以自行修改
          } else {
            that.$Message.error(result.message);
          }
        })
        .catch(function (error) {
          console.log(error);
        });
    },
  },
  created() {},
  mounted() {
    //页面加载后要执行的操作
    var that = this;
    that.GetUserList();
  },
};
</script>

<style>
</style>