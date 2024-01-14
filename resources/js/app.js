
import 'primevue/resources/primevue.min.css';
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';

// primevue
import "primevue/resources/themes/vela-green/theme.css";
import PrimeVue from 'primevue/config';
import StyleClass from 'primevue/styleclass';
import "primevue/resources/themes/vela-green/theme.css"; //theme
import Tooltip from 'primevue/tooltip';
import Ripple from 'primevue/ripple';
import Badge from 'primevue/badge';
import BadgeDirective from 'primevue/badgedirective';
import DataTable from "primevue/datatable"
import Column from "primevue/column";
import Button from 'primevue/button';
import InputText from "primevue/inputtext";
import Card from 'primevue/card';
import Dialog from 'primevue/dialog';
import Toast from 'primevue/toast';
import ToastService from 'primevue/toastservice';
import Panel from 'primevue/panel';
import Fieldset from 'primevue/fieldset';
import Password from 'primevue/password';
import Dropdown from 'primevue/dropdown';
import ConfirmDialog from 'primevue/confirmdialog';
import ConfirmationService from 'primevue/confirmationservice';
import Divider from 'primevue/divider';
import AutoComplete from 'primevue/autocomplete';
import MultiSelect from 'primevue/multiselect'
import FileUpload from 'primevue/fileupload';
import Chip from 'primevue/chip';
import InlineMessage from 'primevue/inlinemessage'


const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .use(PrimeVue, {ripple: true, inputStyle: 'outlined'})
            .use(ToastService)
            .use(ConfirmationService)
            .directive('tooltip', Tooltip)
            .directive('styleclass', StyleClass)
            .directive('badge', BadgeDirective)
            .directive('ripple', Ripple)
            .component('Badge', Badge)
            .component("DataTable", DataTable)
            .component("Column", Column)
            .component("Button", Button)
            .component("InputText", InputText)
            .component("Card", Card)
            .component('Dialog', Dialog)
            .component('Toast', Toast)
            .component('Panel', Panel)
            .component('Fieldset', Fieldset)
            .component('Password', Password)
            .component('Dropdown', Dropdown)
            .component('ConfirmDialog', ConfirmDialog)
            .component('Divider', Divider)
            .component('AutoComplete', AutoComplete)
            .component('MultiSelect', MultiSelect)
            .component('FileUpload', FileUpload)
            .component('Chip', Chip)
            .component('InlineMessage', InlineMessage)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
