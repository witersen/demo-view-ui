<template>
  <Card shadow class="myCard">
    <div slot="title" class="clearfix">
      <span><i class="el-icon-s-platform"></i> 管理系统</span>
    </div>
    <Form
      :model="formUserLogin"
      status-icon
      :rules="rules"
      ref="formUserLogin"
      :label-width="100"
      class="demo-formUserLogin"
      @keydown.enter.native="SubmitForm('formUserLogin')"
    >
      <FormItem label="用户名" prop="userName">
        <Input v-model.number="formUserLogin.userName"></Input>
      </FormItem>
      <FormItem label="密码" prop="userPass">
        <Input
          type="password"
          v-model="formUserLogin.userPass"
          autocomplete="on"
        ></Input>
      </FormItem>
      <FormItem>
        <Button type="primary" @click="SubmitForm('formUserLogin')"
          >登录</Button
        >
      </FormItem>
    </Form>
  </Card>
</template>

<style>
body {
  margin: 0px;
  background-image: url("../images/login-bg.jpg");
}
.myCard {
  width: 500px;
  height: 300px;
  position: absolute;
  left: calc(30vw);
  top: calc(30vh);
}
.time {
  font-size: 13px;
  color: #999;
}

.bottom {
  margin-top: 13px;
  line-height: 12px;
}

.button {
  padding: 0;
  float: right;
}

.image {
  width: 100%;
  display: block;
}

.clearfix:before,
.clearfix:after {
  display: table;
  content: "";
}

.clearfix:after {
  clear: both;
}
</style>

<script>
export default {
  data() {
    //   用户名不为空校验
    var checkUserName = (rule, value, callback) => {
      if (!value) {
        return callback(new Error("用户名不能为空"));
      } else {
        callback();
      }
    };
    // 密码不为空校验
    var checkUserpass = (rule, value, callback) => {
      if (value === "") {
        callback(new Error("密码不能为空"));
      } else {
        callback();
      }
    };
    return {
      // 登录表单
      formUserLogin: {
        userName: "",
        userPass: "",
      },
      // 登录校验规则
      rules: {
        userPass: [{ validator: checkUserpass, trigger: "blur" }],
        userName: [{ validator: checkUserName, trigger: "blur" }],
      },
    };
  },
  methods: {
    //表单提交
    SubmitForm(formName) {
      this.$refs[formName].validate((valid) => {
        if (valid) {
          this.$Message.success('登录成功');
          //跳转到首页
          this.$router.push({ name: "nav1" });
        } else {
          return false;
        }
      });
    },
  },
};
</script>