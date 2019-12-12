<template>
    <div id="contact-form">
        <form>
            <div v-if="errors.length > 0" class="alert alert-danger" >
                <li v-for="error in errors">
                    {{ error }}
                </li>
            </div>
            <!--Step one-->
            <div v-if="step === 1">
                <h2>Schritt eins</h2>
                <legend for="Leistungen">Leistungen:</legend>
                <select id="Leistungen" name="Leistungen" v-model="inquiry.service" class="form-control mb-2">
                    <option value="a">Therapie Aktiv Betreuungsprogramm</option>
                    <option value="b">Marcoumar-Einstellung</option>
                    <option value="c">Schmerztherapie</option>
                    <option value="d">Nahtentfernung</option>
                    <option value="e">Verbandwechsel</option>
                </select>
                <button @click.prevent="next()" class="btn btn-primary">Nächste</button>
            </div>
            <!--Step two-->
            <div v-if="step === 2">
                <h2>Schritt zwei</h2>

                    <p for="q1" class="mb-1">Welche Probleme haben Sie? Warum fühlen Sie sich nicht gut?</p>
                    <input type="text" id="q1" name="q1" v-model="inquiry.q1" class="form-control mb-2">

                    <p for="q2" class="mb-1">Wann treten die Probleme auf? (morgens, mittags, abend)</p>
                    <input type="text" id="q2" name="q2" v-model="inquiry.q2" class="form-control mb-2">

                    <p for="q3" class="mb-1">Wobei, bei welchen Tätigkeiten treten die Probleme?</p>
                    <input type="text" id="q3" name="q3" v-model="inquiry.q3" class="form-control mb-2">

                    <p for="q4" class="mb-1">Was habe ich bisher unternommen?</p>
                    <input type="text" id="q4" name="q4" v-model="inquiry.q4" class="form-control mb-2">

                    <p for="q5" class="mb-1">Gibt es eine Vorbehandlung? Bei welcher Arztpraxis?</p>
                    <input type="text" id="q5" name="q5" v-model="inquiry.q5" class="form-control mb-2">

                    <button @click.prevent="prev()" class="btn btn-primary">Zurück</button>
                    <button @click.prevent="next()" class="btn btn-primary">Nächste</button>

            </div>
            <!--Step three-->
            <div v-if="step === 3">
                <h2>Schritt drei</h2>

                    <p for="name" class="mb-1">Ihre Name:</p>
                    <input id="name" type="text" name="name" v-model="inquiry.name" class="form-control mb-2">

                    <p for="email" class="mb-1">Ihre Email:</p>
                    <input id="email" name="email" type="email" v-model="inquiry.email" class="form-control mb-2">

                    <p for="email" class="mb-1">Ihre Tel. Nr:</p>
                    <input id="phone" name="phone" type="text" v-model="inquiry.phone" class="form-control mb-2">

                    <button @click.prevent="prev()" class="btn btn-primary">Zurück</button>
                    <button @click.prevent="create()" type="button" class="btn btn-primary">Speichern</button>

            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                step: 1,
                inquiry: {
                    // Init values for V-Model
                    name: null,
                    email: null,
                    phone: null,
                    q1: null,
                    q2: null,
                    q3: null,
                    q4: null,
                    q5: null,
                    service: 'a',
                },
                inquiries: [],

                errors: [],

                uri: 'https://patient:8019/contact',

                toastr: toastr.options = {
                    'positionClass': 'toast-bottom-right'
                }
            };
        },
        methods: {
            prev() {
                this.step--;
            },
            next() {
                this.step++;
            },
            create() {
                this.errors = []; // small 'hack' to prevent appending multiple errors

                console.log(this.inquiry.service);
                if (confirm("Anfrage jetzt senden?")) {
                    axios.post(this.uri, {
                        name: this.inquiry.name,
                        email: this.inquiry.email,
                        phone: this.inquiry.phone,
                        service: this.inquiry.service,
                        q1: this.inquiry.q1,
                        q2: this.inquiry.q2,
                        q3: this.inquiry.q3,
                        q4: this.inquiry.q4,
                        q5: this.inquiry.q5
                    }).then(response => {
                        this.inquiries.push(response.data.inquiry);
                        toastr.success("Anfrage gesendet.");
                    }).catch(error => {
                        console.log(error);
                        if (error.response.data.errors.name) {
                            this.errors.push(error.response.data.errors.name[0]);
                        }
                        if (error.response.data.errors.email) {
                            this.errors.push(error.response.data.errors.email[0]);
                        }
                    });
                }
            }
        },
    }
</script>
