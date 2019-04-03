import request from '../util/request.js';

export default {
    namespace: 'search',
    state: {
        size: 0,
        keyword:'demo',
        data: [
        ]
    },
    effects: {
        *querySearch({ payload: keyword }, { call, put }) {
            const URL = '/search.php?s=' + keyword;
            const QueryParam = {
                headers: new Headers(
                )
            }
            const searchResult = yield call(request, URL, QueryParam);
            yield put({ type: 'onLoad', payload: searchResult });
        },

        *page({ payload: pageInfo }, { call, put }) {
            const URL = '/search.php?p=' + pageInfo.page + 's=' + pageInfo.keyword;
            console.log(URL);
        }
    },
    reducers: {
        onLoad(state, { payload: searchResult }) {
            return {
                size: searchResult.size,
                data: searchResult.data
            }
        }
    }
}