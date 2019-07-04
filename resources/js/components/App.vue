<template>
    <div>
        <action-component></action-component>
        <logs-component></logs-component>
    </div>
</template>
<script>
    import ActionComponent from './ActionComponent';
    import LogsComponent from './LogsComponent';

    export default {
        props: ['myData'],
        name: 'app',
        components: {
            ActionComponent,
            LogsComponent
        }
    }

</script>
