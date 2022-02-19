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
          key: "name",
        },
        {
          title: "Age",
          key: "age",
        },
        {
          title: "Address",
          key: "address",
        },
      ],
      data1: [
        {
          name: "John Brown",
          age: 18,
          address: "New York No. 1 Lake Park",
          date: "2016-10-03",
        },
        {
          name: "Jim Green",
          age: 24,
          address: "London No. 1 Lake Park",
          date: "2016-10-01",
        },
        {
          name: "Joe Black",
          age: 30,
          address: "Sydney No. 1 Lake Park",
          date: "2016-10-02",
        },
        {
          name: "Jon Snow",
          age: 26,
          address: "Ottawa No. 2 Lake Park",
          date: "2016-10-04",
        },
      ],
    };
  },
  methods: {},
  created() {},
  mounted() {},
};
</script>

<style>
</style>