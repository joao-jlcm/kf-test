<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <style>
            body {
                font-family: 'Nunito', sans-serif;
                font-size: 1rem;
                line-height: 2;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 sm:items-center py-4 sm:pt-0">
            <div class="max-w-4xl mx-auto">
                <div class="pt-8 flex items-center justify-between">
                    <img src="https://www.kickfurther.com/images/homepage/kf-logo.png" alt="KF Logo" />
                    <h3 class="bg-purple-500 font-semibold text-white rounded-full px-3 py-2 text-xs uppercase">👨‍💻 Coding Assignment</h3>
                </div>

                <div class="mt-8 bg-white overflow-hidden shadow sm:rounded-lg">
                    <div class="py-12 px-10">
                        {{-- Welcome --}}
                        <div class="border-b border-dashed border-gray-200">
                            <div class="text-2xl">
                                Welcome to your Kickfurther coding assignment!
                            </div>
                            <div class="mt-3 mb-6 text-gray-500">
                                <p>
                                    You've been invited to put your Laravel skills to the test. Let's see how much you know about Laravel and problem solving.
                                    The following document details all the requirements for the assignment. Please dedicate your full attention to the test.
                                </p>
                            </div>
                        </div>
                        {{-- Context --}}
                        <div class="border-b border-dashed border-gray-200">
                            <div class="mt-6 text-xl">
                                Context
                            </div>
                            <div class="mt-3 mb-6 text-gray-500 leading-7">
                                Kickfurther is a company that presents potential "Buyers" with opportunities to earn income by purchasing inventory from "Brands".
                                <br />
                                A "Brand" is a Consumer Product Business which presents the public the opportunity to purchase inventory and earn consignment income if the purchased inventory sells.
                                <br />
                                A "Buyer" is a person who crowdfunds the purchase of inventory for a Kickfurther Brand, and can promote the brand and sell that inventory.
                                <br />
                                A "Co-op" (short for "Consignment Opportunity") represents a consignment agreement proposed by a Brand to the Buyers in the Kickfurther community. Under these agreements, Brands present certain products for purchase and resale as consignment inventory. When the consignment inventory sells, the Buyers earn income.
                                <br />
                                A "Purchase" is an entity that represents the participation of a Buyer in a Co-op.
                                <br />
                                A "Transaction" represents the movement of money. When a purchase is done, the financial information should be held in its own transacton. The same logic applies for refunds.
                            </div>
                        </div>
                        {{-- Requirements product team --}}
                        <div class="border-b border-dashed border-gray-200">
                            <div class="mt-8 text-xl">
                                Requirement from the Product team
                            </div>
                            <div class="mt-3 mb-6 text-gray-500">
                                <ul class="list-disc pl-4 space-y-1">
                                    <li>Each coop has an expiration date. We need an automated solution that cancels expired coops and refunds all the purchases that were made to that coop.</li>
                                    <li>If the coop was successfully canceled, notify the coop's owner about what happened. Owners shouldn't be notified if the coop doesn't receive any modifications.</li>
                                    <li>Be sure to mark both the coop and its purchases as canceled.</li>
                                    <li>Avoid refunding a purchase twice.</li>
                                    <li>No human interaction should be required, we expect this process to be fully automated.</li>
                                    <li>There's usually ~30 coops that expire every day.</li>
                                </ul>
                            </div>
                        </div>
                        {{-- Refund logic --}}
                        <div class="border-b border-dashed border-gray-200">
                            <div class="mt-8 text-xl">
                                Refund Logic
                            </div>
                            <div class="mt-3 mb-6 text-gray-500">
                                <p class="leading-7">
                                    If the purchase was done using "funds" or "credits", refund with the same source.
                                    <br/>
                                    Credit card purchases have 2 possible scenarios:<br/>
                                    <ol class="list-outside pl-8 space-y-1 list-decimal">
                                        <li>If the credit card hasn't been charged yet (pending), all you have to do is cancel the transaction.</li>
                                        <li>if the credit card has already been charged, refund the money according to the buyer's refund preference ("credit" or "cc"). For CC refunds use the Stripe helper classes provided.</li>
                                    </ol>
                                </p>
                            </div>
                        </div>
                        {{-- Bonus --}}
                        <div>
                            <div class="mt-8 text-xl">
                                Bonus
                            </div>
                            <div class="mt-3 mb-6 text-gray-500">
                                <p class="leading-7">Consider cases where the coop has ≥ 1000 purchases. Running this process all at once would break because of memory limit issues – coding is optional, you can write down your solution.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 sm:text-left">
                        {{--  --}}
                    </div>

                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
