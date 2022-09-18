<template>
    <div class="table-responsive">
        <table class="table text-center">
            <thead>
                <tr>
                    <th v-for="(header, index) in headers" :key="index">{{ header }}</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(row, index) in data" :key="index" @click="onClick(row)">
                    <td v-for="(cel, i) in row" :key="`${index}_${i}`">
                        {{ cel }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import { computed } from 'vue';

export default {
    name: 'DataTable',
    props: {
        headers: {
            type: Array,
            default: () => {
                return [];
            },
        },

        data: {
            type: Array,
            default: () => {
                return [];
            },
        },
        modelValue: {
            type: Object,
        },
    },
    setup(props, { emit }) {
        const selected = computed({
            get: () => props.modelValue,
            set: (value) => emit('update:modelValue', value),
        });

        const onClick = (row) => {
            selected.value = row;
        };

        return {
            selected,

            onClick,
        };
    },
};
</script>

<style lang="scss" scoped>
tr {
    cursor: pointer;
}
</style>
