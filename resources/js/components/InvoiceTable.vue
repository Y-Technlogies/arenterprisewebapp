<template>
    <div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Rate</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(product, index) in rows">
                    <td>{{ index + 1 }}</td>
                    <td>
                        <select class="form-control" name="product_name" v-model="rows[index].id" @change="updateRow(index)">
                            <option v-for="option in options" v-bind:value="option.id">{{ option.name}}</option>
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
                    <td><input type="input" class="form-control" placeholder="Rate" name="rate" v-model="rows[index].rate" readonly></td>
                    <td><input type="input" class="form-control" placeholder="Amount" name="Amount" v-model="rows[index].amount" readonly></td>
                    <td>
                        <a class="btn btn-primary" @click="addRow"><i class="fa fa-plus"></i></a>
                        <a v-if="index != 0" class="btn btn-danger" @click="removeRow(index)"><i class="fa fa-minus"></i></a>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="input" class="form-control" placeholder="Discount in %" v-model="discount" name="totalQuantity"  @input="calculateDiscount"></td>
                    <td><input type="input" class="form-control" placeholder="Total Quantity" v-model="totalQuantity" name="totalQuantity" readonly><td>
                    <td><input type="input" class="form-control" placeholder="Total Amount" v-model="totalAmount" name="totalAmount" readonly></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: "InvoiceTable",
        data() {
            return {
                product: {id: 0, name: '', quantity: 0, rate: 0, amount: 0},
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

</style>