@extends('layouts.app')

@section('content')
    <section class="about">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">@staticText('page.book.title')</a></li>
            </ul>
        </div>
        <div class="container">
            <div class="about__text">
                <h1>@staticText('page.book.title')</h1>
            </div>
        </div>
    </section>


    <div class="bg__book" x-data="Booking" @click.window="addItemOnGlobalClick">
        <div class="container" style="min-height: 61vh; position: relative;">
            <section class="find__your__city">
                <h3 class="section__title section__title__sm">
                    @staticText('section.findYourCity.title')
                </h3>
                <form @submit.prevent="findCity">
                    <div style="display: flex; flex-direction: column">
                        <div style="display: flex;gap:10px">
                            <input type="text" style="z-index: 100" placeholder="@staticText('placeholder.zipCode')"
                                x-model="formData.zip_code" />
                            <button type="submit" style="z-index: 100">
                                <img src="/storage/img/right_arrow.svg" alt="" />
                            </button>
                        </div>
                        <span style="color: rgb(173, 0, 0); padding: 10px 10px;" x-transition x-show="error" x-transition
                            x-text="errorMessage"></span>
                    </div>

                </form>
            </section>
            <div x-show="validZipCode" x-transition>





                @include('components.book.tv-size')

                @include('components.book.wall-mount')

                @include('components.book.wall-type')


                <div class="section__tv__main">
                    <div>
                        @include('components.book.lifting')

                        @include('components.book.extra-services')
                    </div>

                </div>



                @include('components.book.date-time-picker')


                <!-- Service Address -->
                <section class="find__your__city">
                    <h3 class="section__title section__title__sm">@staticText('section.serviceAddress.title')</h3>
                    <form class="sectionBlck">
                        <input type="text" placeholder="Address" x-model="formData.address" />
                        <input type="text" style="max-width: 20rem" x-model="formData.address_detail"
                            placeholder="Apt, Unit, Floor">
                    </form>
                </section>
                <section class="find__your__city" style="margin-bottom: 100px">
                    <h3 class="section__title section__title__sm">@staticText('section.contactInfo.title')</h3>
                    <form @submit.prevent="submitBooking">
                        <input type="text" placeholder="Fullname" style="max-width:25rem;" x-model="formData.fullname" />
                        <input type="text" style="max-width: 20rem" x-model="formData.phone" placeholder="Phone">
                        <input type="text" style="max-width: 20rem" x-model="formData.email" placeholder="E-mail">
                        <input style="display: none;" value="salam" type="text" style="max-width: 20rem"
                            x-model="formData.salam" placeholder="E-mail">
                        <div id="recaptcha" class="g-recaptcha"></div>
                        <button type="submit">
                            <img src="/storage/img/right_arrow.svg" alt="" />
                        </button>
                    </form>
                </section>


                <div class="section__tv__card desktop_bill" id="bill" style="width: 300px;z-index:800">
                    <div>
                        <h3>TV Wall Mounting</h3>
                        <ul>
                            <template x-for="(item, index) in bill" :key="index">
                                <li>
                                    <div style="display: flex; justify-content:space-between">
                                        <p x-text="item.title"></p>
                                        <h4 x-show="item.price" x-text="item.price"></h4>
                                    </div>
                                </li>
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

                            <h4 x-text="tax">$0</h4>
                        </div>
                        <div>
                            <p>Estimated Total</p>

                            <h4 x-text="totalAmount">$457.33</h4>
                        </div>
                    </div>
                </div>

                <div id="mobileBill" class="section__tv__card" id="bill"
                    style="width: 300px; z-index:800; display:none; position:fixed; top: 100px; ">
                    <div>
                        <h3>TV Wall Mounting</h3>
                        <ul>
                            <template x-for="(item, index) in bill" :key="index">
                                <li>
                                    <div style="display: flex; justify-content:space-between">
                                        <p x-text="item.title"></p>
                                        <h4 x-show="item.price" x-text="item.price"></h4>
                                    </div>
                                </li>
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

                            <h4 x-text="tax">$0</h4>
                        </div>
                        <div>
                            <p>Estimated Total</p>

                            <h4 x-text="totalAmount">$457.33</h4>
                        </div>
                    </div>
                </div>

                <div
                    style="width:fit-content;margin-left: auto;margin-right: auto; z-index: 9999; position: fixed; bottom:70px; left: 25%; right: 25%;">
                    <button id="billBtn"
                        style="padding: 2px 20px 2px 20px; gap: 20px; border-radius: 40px; color: #418DFF; backgound: #fff; font-size:24px; font-weight: 600; gap:20px; cursor:pointer; margin-bottom: 20px">
                        <img src="/storage/img/card-ico.png" style="width:auto; align-self: center" alt="">
                        <span x-text="totalAmount">200$</span>
                        <span id="closeBillBtn" style="color: black; display:none;">&#x2715;</span>
                    </button>
                </div>
            </div>


        </div>
    </div>
@endsection

@once
    @push('footer')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('Booking', () => ({
                    init() {
                        this.triggerFindCity();
                        this.updateAvailableTimes();
                    },
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
                            prices: [],
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
                        extraService: [],
                        date: '',
                        time: [],
                        address: '',
                        address_detail: '',
                        fullname: '',
                        phone: '',
                        email: '',
                        recaptchaToken: '',
                        salam: 'salam',
                    },
                    amount: '$00.00',
                    tax: '$0',
                    totalAmount: '$00.00',
                    bill: [],
                    error: false,
                    validZipCode: false,
                    selectedDate: '{{ now() }}',
                    startHour: 7,
                    availableTimes: [],
                    toggleBill: false,
                    currentDate: new Date(),
                    errorMessage: "@staticText('error.notFoundZipCode.message')",
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
                                                "@staticText('error.notFoundZipCode.message')";
                                        });
                                    }
                                }).then(data => {
                                    this.formData.city.title = data.city;
                                    this.formData.city.id = data.id;
                                    this.addItemOnGlobalClick();
                                })
                                .catch(() => {
                                    this.error = true;
                                    this.errorMessage = "@staticText('error.notFoundZipCode.message')";
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

                        grecaptcha.ready(() => {
                            grecaptcha.execute('6Lf9xHoqAAAAABlaBAGp-6dWQAgPAGQ8sDX6RoEo', {
                                action: 'submit'
                            }).then((token) => {
                                this.formData.recaptchaToken = token
                            });
                        });

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
                    toggleExtraServie(service) {
                        const index = this.formData.extraService.findIndex(s =>
                            s.value === service.id &&
                            s.price === service.price &&
                            s.title === service.title
                        );
                        if (index === -1) {
                            console.log(service);
                            if (service.id === 1) {
                                this.formData.extraService = []
                            } else {
                                this.formData.extraService = this.formData.extraService.filter(
                                    existingService => existingService.value !== 1);
                            }
                            this.formData.extraService.push({
                                value: service.id,
                                price: service.price,
                                title: service.title
                            });
                        } else {
                            this.formData.extraService.splice(index, 1);
                        }
                    },
                    addItemOnGlobalClick() {
                        this.bill = [];
                        if (this.formData.city) {
                            this.bill.push({
                                title: this.formData.city.title,
                            });
                        }

                        if (this.formData.tvSize.title) {
                            this.bill.push({
                                title: this.formData.tvSize.title,
                                price: '$' + Number(this.formData.tvSize.price),
                            });
                        }

                        if (this.formData.wallMount.title) {
                            this.formData.wallMount.price = Number(this.formData.wallMount.prices[this
                                .formData
                                .tvSize.value ?? 1])
                            this.bill.push({
                                title: this.formData.wallMount.title,
                                price: '$' + this.formData.wallMount.price
                            });
                        }

                        if (this.formData.wallType.title) {
                            this.bill.push({
                                title: this.formData.wallType.title,
                                price: '$' + this.formData.wallType.price,
                            });
                        }

                        if (this.formData.liftAssistance.title) {
                            this.bill.push({
                                title: this.formData.liftAssistance.title,
                                price: '$' + this.formData.liftAssistance.price
                            });
                        }

                        if (this.formData.extraService) {
                            this.formData.extraService.forEach(element => {
                                this.bill.push({
                                    title: element.title,
                                    price: '$' + element.price,
                                });
                            });

                        }

                        this.amount =
                            (+this.formData.tvSize.price) +
                            (+this.formData.wallMount.price) + (+this
                                .formData.wallType.price) +
                            (+this.formData.liftAssistance.price) + (+this.formData.extraService.reduce((
                                sum, service) => sum + service.price, 0))

                        this.tax = this.amount * {{ $settings->tax ?? 0 }} / 100;

                        this.totalAmount = `$${this.amount+ this.tax}`
                        this.tax = `$${this.tax}`
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
                                extraService: [],
                                date: '',
                                time: [],
                                address: ''
                            };
                    },
                    triggerFindCity() {
                        if ('{{ request()->zip_code }}') {
                            this.findCity()
                        }
                    },
                    /* updateAvailableTimes() {
                        this.formData.time = [];
                        const selectedDateObj = new Date(this.selectedDate);
                        const currentHour = this.currentDate.getHours();
                        this.availableTimes = [];

                        // Determine start hour based on the selected date
                        let startHour = this.isToday(selectedDateObj) ?
                            Math.max(this.startHour, currentHour + 1) :
                            this.startHour;

                        // Populate available times from start hour to 23:00 (end of day)
                        for (let hour = startHour; hour < 24; hour++) {
                            this.availableTimes.push(this.formatHour(hour));
                        }
                    }, */
                    updateAvailableTimes() {
                        this.formData.time = [];
                        // Create a Date object for the selected date in Los Angeles timezone
                        const selectedDateObj = new Date(this.selectedDate);

                        // Get the current time in Los Angeles timezone
                        const losAngelesNow = new Date().toLocaleString("en-US", {
                            timeZone: "America/Los_Angeles"
                        });
                        const losAngelesTime = new Date(losAngelesNow); // Convert to Date object

                        const currentHourInLosAngeles = losAngelesTime.getHours();
                        const currentMinuteInLosAngeles = losAngelesTime.getMinutes();

                        console.log("Current Time in LA:", losAngelesTime);

                        // Initialize the availableTimes array
                        this.availableTimes = [];

                        // Determine the starting hour based on whether the selected date is today
                        let startHour =
                            this.isToday(selectedDateObj) ?
                            Math.max(
                                this.startHour,
                                currentHourInLosAngeles + (currentMinuteInLosAngeles > 0 ? 1 : 0)
                            ) :
                            this.startHour;

                        // Populate available times from the start hour up to 23:00 (end of day)
                        for (let hour = startHour; hour < 24; hour++) {
                            this.availableTimes.push(this.formatHour(hour));
                        }
                    },

                    // Utility method to check if a date is today
                    isToday(date) {
                        const now = new Date();
                        return (
                            date.getFullYear() === now.getFullYear() &&
                            date.getMonth() === now.getMonth() &&
                            date.getDate() === now.getDate()
                        );
                    },

                    // Utility method to format hour (e.g., 9 -> "09:00")
                    formatHour(hour) {
                        return `${String(hour).padStart(2, "0")}:00`;
                    },

                    isToday(date) {
                        const currentDate = new Date(new Date().toLocaleString('en-US', {
                            timeZone: 'America/Los_Angeles'
                        }));
                        return currentDate.toDateString() === date.toDateString();
                    },
                    convertToLosAngelesTime(date) {
                        return new Date(date).toLocaleString("en-US", {
                            timeZone: "America/Los_Angeles"
                        });
                    },
                    formatHour(hour) {
                        const period = hour >= 12 ? 'pm' : 'am';
                        const formattedHour = hour % 12 || 12;
                        return `${formattedHour}:00 ${period}`;
                    }
                }));
            });
        </script>
        <script>
            let billBtn = document.getElementById('billBtn');
            let mobileBill = document.getElementById('mobileBill');
            let closeBillBtn = document.getElementById('closeBillBtn');
            let open = false;

            billBtn.addEventListener('click', function(e) {
                if (!open) {
                    mobileBill.style.display = 'block';
                    mobileBill.style.transform = 'translateX(5%)';
                    setTimeout(() => {
                        mobileBill.style.opacity = 1;
                        mobileBill.style.transform = 'translateX(0)';
                    }, 10);
                    closeBillBtn.style.display = 'block';
                } else {
                    // Hide with fade-out effect
                    mobileBill.style.opacity = 0;
                    closeBillBtn.style.display = 'none';
                    mobileBill.style.transform = 'translateX(5%)';
                    setTimeout(() => {
                        if (!open) {
                            mobileBill.style.display = 'none';
                        }
                    }, 500); // Match the opacity transition duration
                }

                open = !open;
            });
        </script>
    @endpush
@endonce
