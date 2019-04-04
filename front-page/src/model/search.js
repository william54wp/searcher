import request from '../util/request.js';

export default {
    namespace: 'search',
    state: {
        size: 0,
        page: 1,
        keyword: '',
        data: []
    },

    effects: {
        * querySearch({ payload: keyword }, { call, put }) {
            const page = 1;
            const URL = '/search.php?s=' + keyword + "&p=" + page;
            const searchResult = yield call(request, URL);
            const result = {
                page: page,
                keyword: keyword,
                searchResult: searchResult
            }
            yield put({ type: 'onLoad', payload: result });
        },

        * page({ payload: page }, { call, put, select }) {
            const namespace = 'search';
            const keyword = yield select(state => state[namespace].keyword);
            const URL = '/search.php?p=' + page + '&s=' + keyword;
            const searchResult = yield call(request, URL);
            const result = {
                page: page,
                keyword: keyword,
                searchResult: searchResult
            }
            yield put({ type: 'onLoad', payload: result });
        }
    },

    reducers: {
        onLoad(state, { payload: searchResult }) {
            console.log(searchResult);
            return {
                keyword: searchResult.keyword,
                size: searchResult.searchResult.size,
                data: searchResult.searchResult.data,
                page: searchResult.page
            }
        }
    }
}