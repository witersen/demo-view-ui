<template>
  <Layout :style="{ height: 'calc(100vh)' }">
    <Sider :collapsed-width="78" :style="{ background: '#00152a' }">
      <Menu
        theme="dark"
        style="background-color: #00152a; color: rgb(194, 196, 198)"
        width="auto"
      >
        <!-- 左侧logo -->
        <div
          style="
            color: #f9fbfd;
            height: 64px;
            line-height: 64px;
            text-align: center;
          "
        >
          <h2>logo文字</h2>
        </div>
        <!-- 侧边导航 -->
        <MenuItem name="nav1" to="/nav1">
          <span>nav1</span>
        </MenuItem>
        <MenuItem name="nav2" to="/nav2">
          <span>nav2</span>
        </MenuItem>
      </Menu>
    </Sider>
    <Layout>
      <Header
        style="
          position: absolute;
          z-index: 1;
          width: 100%;
          height: 64px;
          right: 0px;
          background: #fff;
          boxshadow: 0 2px 3px 2px rgba(0, 0, 0, 0.1);
        "
      >
        <Dropdown
          trigger="click"
          transfer
          @on-click="LogOut"
          style="float: right; zindex: 1"
        >
          <!-- 用户名和下拉操作 -->
          <a href="javascript:void(0)" style="margin-left: 8px">
            admin
            <Icon type="ios-arrow-down"></Icon>
          </a>
          <DropdownMenu slot="list">
            <DropdownItem>退出</DropdownItem>
          </DropdownMenu>
        </Dropdown>
        <div style="float: right">
          <!-- 默认头像 -->
          <Avatar icon="ios-person" />
          <!-- 用户角色 -->
          <a style="margin-left: 8px">管理员</a>
        </div>
      </Header>
      <Content
        :style="{
          minHeight: '260px',
          margin: '84px 20px 0px 20px',
        }"
      >
        <router-view></router-view>
      </Content>
    </Layout>
  </Layout>
</template>

<script>
export default {
  data() {
    return {};
  },
  methods: {
    //退出登录
    LogOut() {
      this.$router.push({ name: "login" }); // 跳转到登录页
      this.$message.success("退出登录成功");
    },
    // 退出登录下拉组件
    handleCommand(command) {},
  },
  mounted() {},
  watch: {},
};
</script>