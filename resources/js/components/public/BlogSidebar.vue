<template>
  <div>
    <div class="span4">
      <aside class="right-sidebar">
        <div class="widget">
          <form class="form-search">
            <input
              placeholder="Type something"
              type="text"
              class="input-medium search-query"
              v-model="keyword"
              @keyup="search"
            />
            <button @click.prevent="searchBtn" type="submit" class="btn btn-square btn-theme">Search</button>
          </form>
        </div>
        <div class="widget">
          <h5 class="widgetheading">Categories</h5>
          <ul class="cat">
            <li v-for="(category, index) in allCategory" :key="index">
              <i class="icon-angle-right"></i>
              <router-link :to="`/category-post/${category.id}`">{{category.cat_name}}</router-link>
              <span>({{category.posts_count}})</span>
            </li>
          </ul>
        </div>
        <div class="widget">
          <h5 class="widgetheading">Latest posts</h5>
          <ul class="recent">
            <li v-for="(sidebarBlog, index) in blogs" :key="index">
              <img :src="`uploads/${sidebarBlog.image}`" class="pull-left" alt width="50" />
              <h6>
                <router-link :to="`/blog/${sidebarBlog.id}`">{{sidebarBlog.title}}</router-link>
              </h6>
              <p>{{sidebarBlog.body|textshort(80,'...')}}</p>
            </li>
          </ul>
        </div>
      </aside>
    </div>
  </div>
</template>

<script>
import _ from "lodash";
export default {
  mounted() {
    this.$store.dispatch("getSidebarBlogs");
    this.$store.dispatch("getAllCategory");
  },
  data() {
    return {
      keyword: "",
    };
  },
  computed: {
    allCategory() {
      return this.$store.getters.getAllCategory;
    },
    blogs() {
      return this.$store.getters.getSidebarBlogs;
    },
  },
  methods: {
    search: _.debounce(function () {
      this.$store.dispatch("search", this.keyword);
    }, 1000),
    searchBtn() {
      this.$router.push("/");
      this.$store.dispatch("search", this.keyword);
    },
  },
};
</script>