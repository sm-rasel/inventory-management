<template>
    <div class="container">
        <table id="tableComponent" class="table table-bordered  table-striped">
            <thead>
                <tr>
                    <th  v-for="column in columns" :key='column.title'> 
                    {{column.title}}
                    </th>
                    <th v-if="actions.edit || actions.delete">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in data" :key='item'>
                    <td v-for="column in columns" :key='column.field'>{{item[column.field]}}</td>
                    <button class="btn btn-outline-success btn-sm px-3 m-2" v-if="actions.edit" @click="editData(item.id)">Edit</button>
                    <button class="btn btn-outline-warning btn-sm px-3 m-2" v-if="actions.edit" @click="statusUpdate(item.id)">Update</button>
                    <button class="btn btn-outline-danger btn-sm px-3 m-2" v-if="actions.delete" @click="deleteData(item.id)">Delete</button>
                </tr>
            </tbody>
        </table> 
    </div>
</template>
<script>
export default {
    name: 'BtTable',
    props:{
        data:{
            type: Array,
            required: true
        },
        columns:{
            type: Array,
            required: true
        },
        actions: {
            type: Object,
            required: true
        }
    },
    methods: {
        editData(editId) {
            this.$router.push({ name: 'edit_applicant_form', params: { applicantId: editId } })
            console.log('Edit  Item => ', editId)
        },
        deleteData(deleteId) {
            console.log('Delete  Item => ', deleteId)
        }
    }
}
</script>
<style scoped>
</style>
