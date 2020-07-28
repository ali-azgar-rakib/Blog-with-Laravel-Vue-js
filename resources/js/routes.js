import AdminHome from './components/admin/AdminHome';
// category 
import CategoryList from './components/admin/category/List';
import CategoryCreate from './components/admin/category/Create';
import CategoryEdit from './components/admin/category/Edit';
// post
import PostList from './components/admin/post/List';
import PostCreate from './components/admin/post/Create';
import PostEdit from './components/admin/post/Edit';
import PostShow from './components/admin/post/Show';
// frontend 
import Home from './components/public/Home'
import Blogs from './components/public/Blogs'
import Blog from './components/public/Blog'

export const routes = [
    // category 
    {
        path: '/category',
        component: CategoryList
    }
    ,
    {
        path: '/add-category',
        component: CategoryCreate
    }
    ,
    {
        path: '/edit-category/:id',
        component: CategoryEdit
    },

    // post

    {
        path: '/post-list',
        component: PostList
    },
    {
        path: '/create-post',
        component: PostCreate
    },
    {
        path: '/edit-post/:id',
        component: PostEdit
    },
    {
        path: '/show-post/:id',
        component: PostShow
    },

    // frontend route

    {
        path: '/',
        component: Blogs
    },
    {
        path: '/blog/:id',
        component: Blog
    },
    {
        path: '/category-post/:id',
        component: Blogs
    }




]