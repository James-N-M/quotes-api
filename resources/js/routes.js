import TagPage from './components/TagPage';
import Home from './components/Home';

export default {
    mode: 'history',

    linkActiveClass: 'border-b-2 border-black font-medium text-black',

    routes: [

        {
            path: '/',
            component: Home
        },

        {
            path: '/tags/*',
            component: TagPage
        }
    ]
};
