import axios from 'axios';
import api from '../../../config/api';

const actions = {
    fetchStories({commit, getters}) {
        let postStoryProviderId = getters.selectedProvider.id;
        axios.get(api.endpoints.story_url.get_list_story, {
            params: {
                postStoryProviderId,
            },
        })
            .then(res => {
                commit('SET_STORIES', {
                    stories: res.data.data,
                });
            });
    },
    changeProvider({commit, dispatch}, {provider}) {
        commit('SET_SELECTED_PROVIDER', {provider});
        dispatch('fetchStories');
    },
    fetchProviders({commit, dispatch}) {
        axios.get(api.endpoints.story_provider_url)
            .then(res => {
                let providers = res.data.data;
                commit('SET_PROVIDERS', {
                    providers,
                });
                if (providers && providers.length > 0) {
                    dispatch('changeProvider', {provider: providers[0]});
                }
            });
    },
};

export default actions;
