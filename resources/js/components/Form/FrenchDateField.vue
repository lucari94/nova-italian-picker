<template>
    <default-field :field="field">
        <template slot="field">
            <french-date-time-picker
                class="w-full form-control form-input form-input-bordered"
                :field="field"
                :name="field.name"
                :value="value"
                dateFormat="d-m-Y"
                :placeholder="placeholder"
                :enable-time="false"
                :enable-seconds="false"
                @change="handleChange"
            />

            <p v-if="hasError" class="my-2 text-danger">
                {{ firstError }}
            </p>
        </template>
    </default-field>
</template>

<script>
import FrenchDateTimePicker from './../FrenchDateTimePicker'
import { Errors, FormField, HandlesValidationErrors, InteractsWithDates } from 'laravel-nova'

export default {
    mixins: [HandlesValidationErrors, FormField, InteractsWithDates],

    components: { FrenchDateTimePicker },

    computed: {
        placeholder() {
            return moment().format('DD-MM-YYYY')
        },
    },
}
</script>
