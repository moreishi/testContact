<template>
    <div>
        <table class="table mt-4">
            <thead>
                <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Country</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="c in contacts" :key="c.id">
                    <th>{{c.name}}</th>
                    <td>{{c.email}}</td>
                    <td>{{c.phone}}</td>
                    <td>{{c.country}}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button v-on:click.prevent="viewContact(c.id)" type="button" class="btn btn-secondary">View</button>
                            <button type="button" class="btn btn-secondary">Edit</button>
                            <button v-on:click.prevent="deleteContact(c.id)" type="button" class="btn btn-secondary">Delete</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

        <div id="viewContact" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Contact Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                    <form>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="name" v-bind:value="contact.name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" v-bind:value="contact.email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Phone" class="col-sm-2 col-form-label">Phone</label>
                            <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="Phone" v-bind:value="contact.phone">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="address" v-bind:value="contact.address">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="city" class="col-sm-2 col-form-label">City</label>
                            <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="city" v-bind:value="contact.city">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="state" class="col-sm-2 col-form-label">State</label>
                            <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="state" v-bind:value="contact.state">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="postal" class="col-sm-2 col-form-label">Postal</label>
                            <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="postal" v-bind:value="contact.postal">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="country" class="col-sm-2 col-form-label">Country</label>
                            <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="country" v-bind:value="contact.country">
                            </div>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>

    </div>
</template>
<script>
export default {
    data() {
        return {
            contacts: {},
            contact: {}
        }
    },
    mounted() {
        this.loadContacts();
    },
    methods: {
        loadContacts: function() {
            axios.get('api/contacts')
                 .then(({data}) => {
                     this.contacts = data.contacts;
                 });
        },
        deleteContact: function(id) {
            if(confirm('Are you sure you want to delete this contacts?')) {
                axios.delete('api/contacts/' + id)
                .then(({data}) => {
                    alert('Contact deleted!');
                    this.loadContacts();
                });
            }
        },
        viewContact: function(id) {
            axios.get('api/contacts/' + id)
                .then(({data}) => {
                    this.contact = data.contact;
                    jQuery('#viewContact').modal('show');
                });
            
        }
    }

}
</script>

