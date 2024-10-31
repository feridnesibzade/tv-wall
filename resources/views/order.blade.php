@extends('layouts.app')

@section('content')
    <section class="about">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Book now</a></li>
            </ul>
        </div>
        <div class="container">
            <div class="about__text">
                <h1>Book now</h1>
            </div>
        </div>
    </section>


    <div class="bg__book" x-data="Booking" x-init="triggerFindCity" @click.window="addItemOnGlobalClick">
        <div class="container" style="min-height: 61vh; position: relative;">
            <section class="find__your__city">
                <h3 class="section__title section__title__sm">
                    Find your city
                </h3>
                <form @submit.prevent="findCity">
                    <div style="display: flex; flex-direction: column">
                        <div style="display: flex;gap:10px">
                            <input type="text" style="z-index: 999" placeholder="find your place by name or ZIP-code"
                                x-model="formData.zip_code" />
                            <button type="submit" style="z-index: 999">
                                <img src="/storage/img/right_arrow.svg" alt="" />
                            </button>
                        </div>
                        <span style="color: rgb(173, 0, 0); padding: 10px 10px;" x-transition x-show="error" x-transition
                            x-text="errorMessage"></span>
                    </div>

                </form>
            </section>
            <div x-show="validZipCode" x-transition>

                <div class="section__tv__card" id="bill" style="width: 300px; ">
                    <div>
                        <h3>TV Wall Mounting</h3>
                        <ul>
                            <template x-for="(item, index) in bill" :key="index">
                                <li x-text="item"></li>
                            </template>
                        </ul>
                    </div>
                    <div x-show="formData.date">
                        <img src="/storage/img/calendar.svg" />
                        <div>
                            <p x-text="formData.date"></p>
                            <p x-text="formData.time.join(', ')"></p>
                        </div>
                    </div>

                    <div>
                        <img x-show="formData.address" src="/storage/img/location.svg" />
                        <div>
                            <p x-text="formData.address">56, f5, Santa Clara, CA Obama str. 75</p>
                        </div>
                    </div>
                    <div>
                        <div>
                            <p>Subtotal</p>
                            <h4 x-text="amount">$00.00</h4>
                        </div>
                        <div>
                            <p>Tax Charge</p>

                            <h4>$5</h4>
                        </div>
                        <div>
                            <p>Estimated Total</p>

                            <h4 x-text="totalAmount">$457.33</h4>
                        </div>
                    </div>
                </div>



                @include('components.book.tv-size')

                @include('components.book.wall-mount')

                @include('components.book.wall-type')


                <div class="section__tv__main">
                    <div>
                        <section class="section__tv">
                            <h3>Can you help lift the TV?</h3>
                            <div>
                                <button type="button" :class="{ 'activeBtn': formData.liftAssistance.value === 1 }"
                                    @click="formData.liftAssistance.value = 1; formData.liftAssistance.price = 0; formData.liftAssistance.title = 'I will help'">
                                    I will help
                                </button>
                                <button type="button" :class="{ 'activeBtn': formData.liftAssistance.value === 2 }"
                                    @click="formData.liftAssistance.value = 2; formData.liftAssistance.price = 5; formData.liftAssistance.title = 'Need an assistant'">
                                    Need an assistant
                                </button>
                            </div>
                        </section>

                        @include('components.book.extra-services')
                    </div>

                </div>



                @include('components.book.date-time-picker')


                <!-- Service Address -->
                <section class="find__your__city">
                    <h3 class="section__title section__title__sm">Service Address</h3>
                    <div class="sectionBlck">
                        <input type="text" placeholder="Address" x-model="formData.address" />
                        <input type="text" style="max-width: 20rem" x-model="formData.address_detail"
                            placeholder="Apt, Unit, Floor">
                    </div>
                </section>
                <section class="find__your__city">
                    <h3 class="section__title section__title__sm">Contact Info</h3>
                    <form @submit.prevent="submitBooking">
                        <input type="text" placeholder="Fullname" style="max-width:25rem;" x-model="formData.fullname" />
                        <input type="text" style="max-width: 20rem" x-model="formData.phone"
                            placeholder="formData.phone">
                        <input type="text" style="max-width: 20rem" x-model="formData.email"
                            placeholder="formData.email">
                        <button type="submit">
                            <img src="/storage/img/right_arrow.svg" alt="" />
                        </button>
                    </form>
                </section>
            </div>
        </div>
    </div>
@endsection

@once
    @push('footer')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('Booking', () => ({
                    formData: {
                        zip_code: '{{ request()->zip_code ?? null }}' ?? null,
                        city: {
                            id: '',
                            title: '',
                        },

                        tvSize: {
                            value: '',
                            title: '',
                            price: '',
                        },
                        wallMount: {
                            value: '',
                            title: '',
                            price: '',
                        },
                        wallType: {
                            value: '',
                            title: '',
                            price: '',
                        },
                        liftAssistance: {
                            value: '',
                            title: '',
                            price: '',
                        },
                        extraService: {
                            value: '',
                            title: '',
                            price: '',
                        },
                        date: '',
                        time: [],
                        address: '',
                        address_detail: '',
                        fullname: '',
                        phone: '',
                        email: '',
                    },
                    amount: '$00.00',
                    totalAmount: '$00.00',
                    bill: [],
                    error: false,
                    validZipCode: false,
                    errorMessage: 'There is no department in your city.',
                    findCity() {
                        if (this.formData.zip_code) {
                            fetch(`/find-city?zip_code=${this.formData.zip_code}`, {
                                    method: 'GET',
                                    headers: {
                                        'Content-Type': 'application/json'
                                    },
                                })
                                .then(response => {
                                    if (response.ok) {

                                        this.validZipCode = true;
                                        this.error = false;
                                        return response.json();
                                    } else {
                                        this.validZipCode = false;
                                        this.error = true;
                                        return response.json().then(data => {
                                            this.errorMessage = data.message ||
                                                'There is no department in your city.';
                                        });
                                    }
                                }).then(data => {
                                    this.formData.city.title = data.city;
                                    this.formData.city.id = data.id;
                                    this.addItemOnGlobalClick();
                                })
                                .catch(() => {
                                    this.error = true;
                                    this.errorMessage = 'There is no department in your city.';
                                    this.validZipCode = false;
                                });
                        } else {
                            this.error = true;
                            this.errorMessage = 'Zip code is required.';
                        }
                    },
                    submitBooking() {
                        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content');
                        fetch(`/create-order`, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'Accept': 'application/json',
                                    'X-CSRF-TOKEN': csrfToken
                                },
                                body: JSON.stringify(this.formData)
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.errors) {
                                    Swal.fire({
                                        title: 'Error',
                                        text: data.message,
                                        icon: "error",
                                        showConfirmButton: false,
                                        timer: 10000
                                    });
                                } else {
                                    window.location.href = '/book/success'
                                }
                            })
                    },
                    toggleTime(time) {
                        const index = this.formData.time.indexOf(time);
                        if (index === -1) {
                            this.formData.time.push(time); // Add time if not already selected
                        } else {
                            this.formData.time.splice(index, 1); // Remove time if already selected
                        }
                    },
                    addItemOnGlobalClick() {
                        this.bill = [];
                        if (this.formData.city) {
                            this.bill.push(this.formData.city.title);
                        }

                        if (this.formData.tvSize.title) {
                            this.bill.push(this.formData.tvSize.title);
                        }

                        if (this.formData.wallMount.title) {
                            this.bill.push(this.formData.wallMount.title);
                        }

                        if (this.formData.wallType.title) {
                            this.bill.push(this.formData.wallType.title);
                        }

                        if (this.formData.liftAssistance.title) {
                            this.bill.push(this.formData.liftAssistance.title);
                        }

                        if (this.formData.extraService.title) {
                            this.bill.push(this.formData.extraService.title);
                        }

                        this.amount =
                            (+this.formData.tvSize.price) +
                            (+this.formData.wallMount.price) + (+this
                                .formData.wallType.price) +
                            (+this.formData.liftAssistance.price) + (+this.formData.extraService.price)


                        this.totalAmount = `$${this.amount+ 5}`
                        this.amount = `$${this.amount}`

                    },
                    resetFormData() {
                        this.amount = '$00.00';
                        this.totalAmount = '$00.00';
                        this.bill = [];
                        this.error = false;
                        this.validZipCode = false,
                            this.formData = {
                                zip_code: '',
                                city: {
                                    id: '',
                                    title: '',
                                },
                                tvSize: {
                                    value: '',
                                    title: '',
                                    price: '',
                                },
                                wallMount: {
                                    value: '',
                                    title: '',
                                    price: '',
                                },
                                wallType: {
                                    value: '',
                                    title: '',
                                    price: '',
                                },
                                liftAssistance: {
                                    value: '',
                                    title: '',
                                    price: '',
                                },
                                extraService: {
                                    value: '',
                                    title: '',
                                    price: '',
                                },
                                date: '',
                                time: [],
                                address: ''
                            };
                    },
                    triggerFindCity() {
                        if ('{{ request()->zip_code }}') {
                            this.findCity()
                        }
                    }
                }));
            });
        </script>
    @endpush
@endonce
