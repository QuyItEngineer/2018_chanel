import getters from './getters';
import actions from './actions';
import mutations from './mutations';

const state = {
    stories: [],
    providers: [],
    provider: null,
    error: {},
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations,
};
