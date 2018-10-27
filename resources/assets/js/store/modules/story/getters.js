const getters = {
    selectedProvider: (state, getters, rootState) => {
        if (state.provider) {
            return state.provider;
        }

        if (state.providers && state.providers.length > 0) {
            return state.providers[0];
        }

        return {};
    },
};

export default getters;
