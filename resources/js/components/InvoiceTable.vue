<template>
    <form @submit.prevent="submit">
        <table class="table">
            <tbody>
                <tr>
                    <td rowspan="9" style="border: 0;"></td>
                    <td colspan="3" rowspan="4" width="50%">
                        A.R Enterprice <br>
                        191 K Y Plaza(4th floor) <br>
                        Fokira Pool, Motijheel C/A <br>
                        Dhaka-1000 <br>
                        Phone:02-7191365 <br>
                        Mobile: 01716-511288, 01705-478851 <br>
                        Email: arenterprisebd2012@gmail.com, powerlube12@gmail.com

                    </td>
                    <td colspan="2">
                        Invoice No <br>
                        <b>
                            {{ invoice.invoice_no }}
                        </b>
                    </td>
                    <td colspan="2">
                        Date <br>
                        <b>
                           {{ invoice.issueDate }}
                        </b>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        Delivery Note: <br>
                        <textarea name="note" v-model="invoice.delivery_note" class="form-control" cols="4" rows="3" />
                    </td>
                    <td colspan="2">Mode/Term of payment: <br>
                        <b>
                            Cradit
                        </b>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        Agent: <br>
                        <select v-if="agents.length" class="form-control" name="agent" v-model="invoice.agentId">
                            <option v-for="option in agents" v-bind:value="option.agents_id">{{ option.agents_fname }} {{ option.agents_lname }}</option>
                        </select>
                    </td>
                    <td colspan="2">Client <br>
                        <select v-if="clients.length" class="form-control" name="client" v-model="invoice.clientId" @change="selectClient">
                            <option v-for="option in clients" v-bind:value="option.client_id">{{ option.companyname }}</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">Buyer's order No: <br></td>
                    <td colspan="2">Date <br></td>
                </tr>
                <tr>
                    <td colspan="3" rowspan="3">
                        Buyer: <br>
                        {{ client.companyname }} <br>
                        {{ client.propname }} <br>
                        {{ client.address }} <br>
                        {{ client.propphone1 }}, {{ client.propphone2 }}<br>
                        {{ client.transport }}
                    </td>
                    <td colspan="2">Dispatch Document No: <br></td>
                    <td colspan="2">Date</td>
                </tr>
                <tr>
                    <td colspan="2">Address <br></td>
                    <td colspan="2">Destination <br>
                        {{ client.destination }}
                    </td>
                </tr>
                <tr>
                    <td colspan="4" rowspan="2">Terms of Delivery: <br>
                        <textarea name="note" class="form-control" cols="4" rows="3" v-model="invoice.delivery_note" />
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        Discount given in %
                        <input type="input" class="form-control" placeholder="ex: 50%" v-model="discount" name="totalQuantity"  @input="updateTotalInvoice">
                    </td>
                </tr>
                <tr>
                    <td colspan="3" class="text-center">Description of Gods</td>
                    <td>Quantity/Cat</td>
                    <td>Rate/Cat</td>
                    <td colspan="2">Amount</td>
                </tr>
                <tr v-for="(row, index) in rows">
                    <td style="border: 0;">
                        <div class="btn-group">
                            <a v-if="index === 0" href="#" class="btn btn-sm btn-info" @click.prevent="addRow"><i class="fa fa-plus"></i></a>
                            <a v-if="index > 0" href="#" class="btn btn-sm btn-danger" @click.prevent="removeRow(index)"><i class="fa fa-trash"></i></a>
                        </div>
                    </td>
                    <td colspan="3" class="text-center">
                        <select v-if="options.length" class="form-control" name="product_name" v-model="rows[index].id" @change="updateRow(index)">
                            <option v-for="option in options" v-bind:value="option.id">{{ option.name }}</option>
                        </select>
                    </td>
                    <td>
                        <input type="input"
                               class="form-control"
                               placeholder="Quantity"
                               name="quantity"
                               @input="updateAmount(index)"
                               v-model="rows[index].quantity" :disabled="rows[index].id === 0">
                    </td>
                    <td>{{ row.rate }}</td>
                    <td colspan="2">{{ row.amount }}</td>
                </tr>
                <tr>
                    <td style="border: 0;"></td>
                    <td colspan="3" class="text-right">Total</td>
                    <td>{{ totalQuantity }}</td>
                    <td></td>
                    <td colspan="2">{{ totalAmount }}</td>
                </tr>
                <tr>
                    <td style="border: 0;" colspan="7"></td>
                    <td style="border: 0;" class="text-right">
                        <button class="btn btn-info" :disabled="isDisabled">Save</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</template>

<script>
    export default {
        name: "InvoiceTable",
        props: ['route'],
        data() {
            return {
                product: {id: 0, name: '', quantity: 0, rate: 0, amount: 0},
                rows: [],
                options: [],
                clients: [],
                agents: [],
                productName: '',
                totalAmount: '',
                totalQuantity: '',
                discount: '',
                invoice: { clientId: 0, issueDate: '' , agentId: 0, delivery_note: '', totalAmount: 0, totalQuantity: 0, discount: 0},
                client: {},
                field: {
                    product: [],
                    invoice: {}
                },
            }
        },
        created() {
            this.initInvoice();
            this.rows.push(this.product);
            this.productOption();
            this.clientList();
            this.agentList();
        },
        computed: {
            isDisabled() {
                return (this.rows[0].id === 0) || (this.invoice.agentId === 0) || (this.invoice.clientId === 0);
            }
        },
        methods: {

            initInvoice() {
                this.invoice.issueDate = new Date().toLocaleDateString();
                this.invoice.invoice_no =  Math.floor(1000 + Math.random() * 999);
            },
            addRow: function () {
                this.rows.push({id: 0, name: '', quantity: 0, rate: 0, amount: 0});
            },

            removeRow: function (index) {
                this.rows.splice(index, 1);
                this.updateTotalInvoice();
            },

            productOption() {
                axios.get('/product-list')
                    .then((response) => {
                        this.options = JSON.parse(JSON.stringify(response.data));
                    });
            },

            clientList() {
                axios.get('/client-list')
                    .then((response) => {
                        this.clients = JSON.parse(JSON.stringify(response.data));
                    });
            },

            agentList() {
                    axios.get('/agent-list')
                        .then((response) => {
                            this.agents = JSON.parse(JSON.stringify(response.data));
                        });
                },

            selectClient(){
                this.client = this.clients.find(client => {
                    return (client.client_id === this.invoice.clientId);
                });
            },
            updateRow(index) {

                let product = this.options.find((data) => {
                    return (data.id === this.rows[index].id);
                });

                this.rows[index].name = product.name;
                this.rows[index].quantity = 1;
                this.rows[index].rate = product.price;
                this.rows[index].amount = product.price * this.rows[index].quantity;
                this.updateTotalInvoice();
            },

            updateAmount(index) {
                this.rows[index].amount = this.rows[index].rate * this.rows[index].quantity;
                this.updateTotalInvoice();
            },

            updateTotalInvoice() {

                this.totalQuantity = this.rows.reduce(function (sum, row) {
                    return sum + parseInt(row.quantity);
                }, 0);

                this.totalAmount = this.rows.reduce(function (sum, row) {
                    return sum + row.amount;
                }, 0);

                if (this.discount !== '') {
                    this.totalAmount = this.totalAmount - this.totalAmount * (parseInt(this.discount) / 100);
                }

                this.invoice.totalAmount = this.totalAmount;
                this.invoice.totalQuantity = this.totalQuantity;
                this.invoice.discount = this.discount;
            },
            submit() {
                this.field.invoice = {...this.invoice};

                for (let index in this.rows) {
                    this.field.product.push(this.rows[index]);
                }

                axios.post(this.route, this.field).then(response => {
                   window.location.href = response.data.url;
                }).catch(error => {
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors || {};
                    }
                });
            }
        }
    }
</script>

<style scoped>
    td {
        border : 1px solid #dee2e6;
    }
</style>