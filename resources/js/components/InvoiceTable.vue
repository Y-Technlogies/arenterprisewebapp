<template>
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
                    2010
                </b>
            </td>
            <td colspan="2">
                Date <br>
                <b>
                    12-Mar-2021
                </b>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                Delivery Note: <br>

            </td>
            <td colspan="2">Mode/Term of payment: <br>
                <b>
                    Cradit
                </b>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                Aggent: <br>
                <b>Md. Main Uddin</b>
            </td>
            <td colspan="2">Client <br></td>
        </tr>
        <tr>
            <td colspan="2">Buyer's order No: <br></td>
            <td colspan="2">Date <br></td>
        </tr>
        <tr>
            <td colspan="3" rowspan="3">Buyer: <br></td>
            <td colspan="2">Dispatch Document No: <br></td>
            <td colspan="2">Date</td>
        </tr>
        <tr>
            <td colspan="2">Address <br></td>
            <td colspan="2">Destination <br></td>
        </tr>
        <tr>
            <td colspan="4" rowspan="2">Terms of Delivery: <br></td>
        </tr>
        <tr>
            <td colspan="3">28<br></td>
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
                <span class="font-italic" style="color: gray;" v-if="!row.editable" @click="row.editable = true">
                    {{ row.name }}
                </span>
                <select name="product_name" v-else @blur="row.editable = false">
                    <option v-for="option in options" value="{{ option.id }}">{{ option.name }}</option>
                </select>

            </td>
            <td>{{ row.quantity }}</td>
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
        </tbody>
    </table>
</template>

<script>
    export default {
        name: "InvoiceTable",
        data() {
            return {
                product: {id: 0, name: '--Select Product--', quantity: 0, rate: 0, amount: 0, editable: false},
                rows: [],
                options: [],
                productName: '',
                totalAmount: '',
                totalQuantity: '',
                discount: ''
            }
        },
        created() {
            this.rows.push(this.product);
            this.productOption();
        },
        methods: {
            addRow: function () {
                this.rows.push(this.product);
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
            },

            calculateDiscount() {

                this.updateTotalInvoice();

                if (this.discount === '') {
                    return;
                }

                this.totalAmount = this.totalAmount - this.totalAmount * (parseInt(this.discount) / 100);
            }
        }
    }
</script>

<style scoped>
    td {
        border : 1px solid #dee2e6;
    }
</style>