import TagPage from './components/TagPage';
import Home from './components/Home';
import QuoteSearchPage from './components/QuoteSearchPage';

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
        },
        {
            path: '/search/quotes/:tag',
            name: QuoteSearchPage,
            component: QuoteSearchPage,
            props: true
        },
        {
            path: '/search/quotes:tag',
            name: 'search-quotes',
            component: QuoteSearchPage,
        }
    ]
};
