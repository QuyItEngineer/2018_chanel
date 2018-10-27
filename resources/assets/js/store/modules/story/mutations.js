const mutations = {
    SET_STORIES(state, {stories}) {
        state.stories = stories;
    },
    SET_PROVIDERS(state, {providers}) {
        if (!Array.isArray(providers)) {
            throw TypeError('Providers must be an array!');
        }
        state.providers = providers;
    },
    SET_SELECTED_PROVIDER(state, {provider}) {
        state.provider = provider;
    },
    SET_ERROR(state, {error}) {
        state.error = error;
    },
};

export default mutations;
