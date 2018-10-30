Nova.booting((Vue, router) => {
    Vue.component('index-french-date', require('./components/Index/FrenchDateField'));
    Vue.component('detail-french-date', require('./components/Detail/FrenchDateField'));
    Vue.component('form-french-date', require('./components/Form/FrenchDateField'));
})
