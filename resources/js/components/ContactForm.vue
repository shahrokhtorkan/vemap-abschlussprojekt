<template>
    <div id="contact-form">
        <form>
            <div v-if="errors.length" class="alert alert-danger" >
                <li v-for="error in errors">
                    {{ error }}
                </li>
            </div>
            <div v-if="step === 1">
                <h2>Schritt 1/3</h2>
                <p>Wählen sie bitte die entsprechende Leistung aus und füllen Sie das Formular vollständig aus.</p>
                <select id="service" name="service" v-model="inquiry.service" class="form-control mb-2">
                    <option value="" disabled selected> -- wählen Sie Ihre gewünschte Leistung -- </option>
                    <option value="Therapie Aktiv Betreuungsprogramm">Therapie Aktiv Betreuungsprogramm</option>
                    <option value="Marcoumar-Einstellung">Marcoumar-Einstellung</option>
                    <option value="Schmerztherapie">Schmerztherapie</option>
                    <option value="Nahtentfernung">Nahtentfernung</option>
                    <option value="Verbandwechsel">Verbandwechsel</option>
                </select>
                <button @click.prevent="next()" class="btn btn-primary">Weiter</button>
            </div>
            <div v-if="step === 2">
                <h2>Schritt 2/3</h2>
                    <p for="q1" class="mb-1">Welche Probleme haben Sie? Warum fühlen Sie sich nicht gut?</p>
                    <input type="text" id="q1" name="q1" v-model="inquiry.q1" class="form-control mb-2">

                    <p for="q2" class="mb-1">Wann treten die Probleme auf? (morgens, mittags, abend)</p>
                    <input type="text" id="q2" name="q2" v-model="inquiry.q2" class="form-control mb-2">

                    <p for="q3" class="mb-1">Wobei, bei welchen Tätigkeiten treten die Probleme?</p>
                    <input type="text" id="q3" name="q3" v-model="inquiry.q3" class="form-control mb-2">

                    <p for="q4" class="mb-1">Was haben Sie bisher unternommen?</p>
                    <input type="text" id="q4" name="q4" v-model="inquiry.q4" class="form-control mb-2">

                    <p for="q5" class="mb-1">Gibt es eine Vorbehandlung? Bei welcher Arztpraxis?</p>
                    <input type="text" id="q5" name="q5" v-model="inquiry.q5" class="form-control mb-2">

                    <button @click.prevent="prev()" class="btn btn-primary">Zurück</button>
                    <button @click.prevent="next()" class="btn btn-primary">Weiter</button>
            </div>
            <div v-if="step === 3">
                <h2>Schritt 3/3</h2>
                    <p for="name" class="mb-1">Ihr Name:</p>
                    <input id="name" type="text" name="name" v-model="inquiry.name" class="form-control mb-2">

                    <p for="email" class="mb-1">Ihre Email:</p>
                    <input id="email" name="email" type="email" v-model="inquiry.email" class="form-control mb-2">

                    <p for="email" class="mb-1">Ihre Tel. Nr:</p>
                    <input id="phone" name="phone" type="text" v-model="inquiry.phone" class="form-control mb-2">

                    <button @click.prevent="prev()" class="btn btn-primary">Zurück</button>
                    <button @click.prevent="create()" type="button" class="btn btn-primary">Absenden</button>
            </div>
            <div v-if="step === 4">
                <h2>Danke Ihnen!</h2>
                <p>Sie erhalten umgehend eine Nachricht bzw. einen Anruf.</p>
                <a href="/" class="btn btn-primary">Zurück zur Hauptseite</a>
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
                    service: "",
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
                this.errors = [];
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
                        this.step++;
                        this.$forceUpdate(); // Refresh component
                    }).catch(error => {
                        //console.log(error.response.data.errors);
                        if (error.response.data.errors.name) {
                            this.errors.push(error.response.data.errors.name[0]);
                        }
                        if (error.response.data.errors.email) {
                            this.errors.push(error.response.data.errors.email[0]);
                        }
                        if (error.response.data.errors.email) {
                            this.errors.push(error.response.data.errors.phone[0]);
                        }
                        if (error.response.data.errors.service) {
                            this.errors.push(error.response.data.errors.service[0]);
                        }
                    });
                }
            }
        }
    }
</script>
