import AllProducts from './components/products/index.vue';
import filterProductsByCategory from "./components/products/filterProductsByCategory";

export const routes = [
    {
        name: 'filterProductsByCategory',
        path: '/filterProductsByCategory/:category_id',
        component: filterProductsByCategory
    },
    {
        name: 'home',
        path: '/',
        component: AllProducts
    }
];
