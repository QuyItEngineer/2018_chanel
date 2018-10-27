import Vue from 'vue';
import Vuex from 'vuex';
import example from './modules/example';
import story from './modules/story';

Vue.use(Vuex);

const debug = process.env.NODE_ENV !== 'production';

export default new Vuex.Store({
    modules: {
        example,
        story,
    },
    strict: debug,
    plugins: debug ? [] : [],
});
