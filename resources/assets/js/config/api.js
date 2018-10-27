import {env} from './index';

const api_url = env('BASE_URL', 'http://localhost:8080/') + 'api/';
export default {
    api_url,
    token_url: env('BASE_URL', 'http://localhost:8080/') + 'oauth/token',
    current_user_url: api_url + 'user',
    endpoints: {
        users_url: api_url + 'users',
        story_url: {
            get_list_story: api_url + 'story/getListStory',
        },
        story_provider_url: api_url + 'post_story_providers',
        // resource_url : api_url + 'resource'
    },
};
