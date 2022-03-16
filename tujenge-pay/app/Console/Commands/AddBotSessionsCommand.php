<?php

namespace App\Console\Commands;

use App\Models\BotResponse;
use App\Models\BotSession;
use App\Models\BotSessionStep;
use Illuminate\Console\Command;

class AddBotSessionsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bot:add-sessions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $bot_sessions = [
            [
                'session_name' => 'aar',
                'channel' => 'WA',
                'session_switching' => 1,
                'session_key_word' => 0,
                'session_steps' => [
                    [
                        'channel' => 'WA',
                        'is_initial_step' => true,
                        'session_step' => 0,
                        'step_title' => "Hi profilename 👋🏽 , I'm *Linzi* from AAR Kenya Insurance. I'm here to help you with all your questions quick and fast.\n\nPlease choose an option below to start👇🏽\n\n",
                        'next_session_step' => 1,
                        'service_methods' => [
                            [
                                'method_name' => 'checkIfMembershipIsset',
                                'method_type' => 'membership_check',
                            ]
                        ],
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'response_text' => 'My Cover',
                                'show_step_id' => 1,
                                'next_session_step' => 1
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 2,
                                'response_text' => 'Benefit balances',
                                'show_step_id' => 1,
                                'next_session_step' => 1
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 3,
                                'response_text' => 'Cover utilization',
                                'show_step_id' => 1,
                                'next_session_step' => 1
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 4,
                                'response_text' => 'Claims',
                                'show_step_id' => 1,
                                'next_session_step' => 1
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 5,
                                'response_text' => 'Pay outstanding premium',
                                'show_step_id' => 1,
                                'next_session_step' => 1
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 6,
                                'response_text' => 'Premium statement',
                                'show_step_id' => 1,
                                'next_session_step' => 1
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 7,
                                'response_text' => 'Request for quote',
                                'show_step_id' => 1,
                                'next_session_step' => 61
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 8,
                                'response_text' => 'Request for letters',
                                'show_step_id' => 1,
                                'next_session_step' => 1
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 9,
                                'response_text' => 'Buy insurance product',
                                'show_step_id' => 1,
                                'next_session_step' => 1
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 10,
                                'response_text' => 'Contact customer care',
                                'show_step_id' => 1,
                                'next_session_step' => 1
                            ],
//                            [
//                                'channel' => 'WA',
//                                'key_word' => 11,
//                                'response_text' => 'View my email and text subscriptions status',
//                                'show_step_id' => 1,
//                                'next_session_step' => 1
//                            ]
                        ]
                    ]
                ]
            ],
            [
                'session_name' => 'my_cover',
                'channel' => 'WA',
                'session_switching' => 1,
                'session_key_word' => 1,
                'session_steps' => [
                    [
                        'channel' => 'WA',
                        'is_initial_step' => true,
                        'session_step' => 0,
                        'step_title' => '',
                        'next_session_step' => 2,
                        'service_methods' => [
                            [
                                'method_name' => 'queryAndValidateMembershipNo',
                                'method_type' => 'validate',
                            ],
                            [
                                'method_name' => 'updateWhatsAppMembershipNo',
                                'method_type' => 'update_membership_no',
                            ],
                            [
                                'method_name' => 'sendOtp',
                                'method_type' => 'send_otp',
                            ]
                        ],
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'show_step_id' => 0,
                                'response_text' => 'Great! 👍🏾. Type your membership number in this format 👉🏾 *E.g. KE12345000 or AK12345000*',
                                'next_session_step' => 2
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 2,
                        'step_title' => '',
                        'next_session_step' => 3,
                        'service_methods' => [
                            [
                                'method_name' => 'confirmOtp',
                                'method_type' => 'confirm_otp',
                            ],
                            [
                                'method_name' => 'queryCover',
                                'method_type' => 'query_cover',
                            ]
                        ],
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 3,
                                'show_step_id' => 0,
                                'response_text' => "Hi profilename 👋🏽. Please type in the OTP sent to you via SMS.\n\n",
                                'next_session_step' => 3
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 3,
                        'step_title' => '',
                        'next_session_step' => 4,
                        'response_source' => 'function',
                        'response_function' => 'queryCover',
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 3,
                                'show_step_id' => 0,
                                'response_text' => '',
                                'next_session_step' => 4
                            ]
                        ]
                    ]
                ]
            ],
            [
                'session_name' => 'balances',
                'channel' => 'WA',
                'session_switching' => 1,
                'session_key_word' => 2,
                'session_steps' => [
                    [
                        'channel' => 'WA',
                        'is_initial_step' => true,
                        'session_step' => 0,
                        'step_title' => '',
                        'next_session_step' => 2,
                        'service_methods' => [
                            [
                                'method_name' => 'queryAndValidateMembershipNo',
                                'method_type' => 'validate',
                            ],
                            [
                                'method_name' => 'updateWhatsAppMembershipNo',
                                'method_type' => 'update_membership_no',
                            ],
                            [
                                'method_name' => 'sendOtp',
                                'method_type' => 'send_otp',
                            ]
                        ],
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'show_step_id' => 0,
                                'response_text' => 'Great! 👍🏾. Type your membership number in this format 👉🏾 *E.g. KE12345000 or AK12345000*',
                                'next_session_step' => 2
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 2,
                        'step_title' => '',
                        'next_session_step' => 3,
                        'service_methods' => [
                            [
                                'method_name' => 'confirmOtp',
                                'method_type' => 'confirm_otp',
                            ],
                            [
                                'method_name' => 'queryBalances',
                                'method_type' => 'query_balance',
                            ]
                        ],
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 3,
                                'show_step_id' => 0,
                                'response_text' => "Hi profilename 👋🏽. Please type in the OTP sent to you via SMS.\n\n",
                                'next_session_step' => 3
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 3,
                        'step_title' => '',
                        'next_session_step' => 4,
                        'response_source' => 'function',
                        'response_function' => 'queryBalances',
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 3,
                                'show_step_id' => 0,
                                'response_text' => '',
                                'next_session_step' => 4
                            ]
                        ]
                    ]
                ]
            ],
            [
                'session_name' => 'cover_utilization',
                'channel' => 'WA',
                'session_switching' => 1,
                'session_key_word' => 3,
                'session_steps' => [
                    [
                        'channel' => 'WA',
                        'is_initial_step' => true,
                        'session_step' => 0,
                        'step_title' => '',
                        'next_session_step' => 2,
                        'service_methods' => [
                            [
                                'method_name' => 'queryAndValidateMembershipNo',
                                'method_type' => 'validate',
                            ],
                            [
                                'method_name' => 'updateWhatsAppMembershipNo',
                                'method_type' => 'update_membership_no',
                            ],
                            [
                                'method_name' => 'sendOtp',
                                'method_type' => 'send_otp',
                            ]
                        ],
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'show_step_id' => 0,
                                'response_text' => 'Great! 👍🏾. Type your membership number in this format 👉🏾 *E.g. KE12345000 or AK12345000*',
                                'next_session_step' => 2
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 2,
                        'step_title' => '',
                        'next_session_step' => 3,
                        'service_methods' => [
                            [
                                'method_name' => 'confirmOtp',
                                'method_type' => 'confirm_otp',
                            ],
                            [
                                'method_name' => 'queryUtilization',
                                'method_type' => 'query_utilization',
                            ]
                        ],
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 3,
                                'show_step_id' => 0,
                                'response_text' => "Hi profilename 👋🏽. Please type in the OTP sent to you via SMS.\n\n",
                                'next_session_step' => 3
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 3,
                        'step_title' => '',
                        'next_session_step' => 4,
                        'response_source' => 'function',
                        'response_function' => 'queryUtilization',
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 3,
                                'show_step_id' => 0,
                                'response_text' => 'hhdhs',
                                'next_session_step' => 4
                            ]
                        ]
                    ]
                ]
            ],
            [
                'session_name' => 'claims',
                'channel' => 'WA',
                'session_switching' => 1,
                'session_key_word' => 4,
                'session_steps' => [
                    [
                        'channel' => 'WA',
                        'is_initial_step' => true,
                        'session_step' => 0,
                        'step_title' => '',
                        'next_session_step' => 1,
                        'service_methods' => [
                            [
                                'method_name' => 'queryAndValidateMembershipNo',
                                'method_type' => 'validate',
                            ],
                            [
                                'method_name' => 'updateWhatsAppMembershipNo',
                                'method_type' => 'update_membership_no',
                            ],
                            [
                                'method_name' => 'sendOtp',
                                'method_type' => 'send_otp',
                            ]
                        ],
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'response_text' => 'Great! 👍🏾. Type your membership number in this format 👉🏾 *E.g. KE12345000 or AK12345000*',
                                'show_step_id' => 0,
                                'next_session_step' => 1
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 1,
                        'step_title' => '',
                        'next_session_step' => 2,
                        'service_methods' => [
                            [
                                'method_name' => 'confirmOtp',
                                'method_type' => 'confirm_otp',
                            ]
                        ],
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 2,
                                'response_text' => "Hi profilename 👋🏽. Please type in the OTP sent to you via SMS.\n\n",
                                'show_step_id' => 0,
                                'next_session_step' => 2
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 2,
                        'step_title' => "Hi profilename 👋🏽.\n\nWhat type of claim would you like to file?\n\nChoose one below",
                        'next_session_step' => 3,
                        'reply_type' => 'inline_buttons',
                        'with_input' => 0,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'response_text' => 'File claim',
                                'show_step_id' => 1,
                                'next_session_step' => 3
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 2,
                                'response_text' => 'Track claim status',
                                'show_step_id' => 1,
                                'next_session_step' => 28
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 3,
                        'step_title' => "Please reply with the type of claim below\n\n",
                        'next_session_step' => 4,
                        'reply_type' => 'inline_buttons',
                        'with_input' => 0,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'response_text' => 'Inpatient Claim',
                                'show_step_id' => 1,
                                'next_session_step' => 4
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 2,
                                'response_text' => 'Outpatient Claim',
                                'show_step_id' => 1,
                                'next_session_step' => 5
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 4,
                        'step_title' => "Was the admission reported\n\n",
                        'next_session_step' => 5,
                        'reply_type' => 'inline_buttons',
                        'with_input' => 0,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'response_text' => 'Yes',
                                'show_step_id' => 1,
                                'next_session_step' => 5
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 2,
                                'response_text' => 'No',
                                'show_step_id' => 1,
                                'next_session_step' => 26
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 5,
                        'step_title' => 'Please type in your full name',
                        'next_session_step' => 6,
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'response_text' => '',
                                'show_step_id' => 0,
                                'next_session_step' => 6
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 6,
                        'step_title' => 'Great! Please now type in your I.D number',
                        'next_session_step' => 7,
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'response_text' => '',
                                'show_step_id' => 0,
                                'next_session_step' => 7
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 7,
                        'step_title' => "Awesome! What's your email address?",
                        'next_session_step' => 8,
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 2,
                                'response_text' => '',
                                'show_step_id' => 0,
                                'next_session_step' => 8
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 8,
                        'step_title' => "What's your nationality?",
                        'next_session_step' => 9,
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 2,
                                'response_text' => '',
                                'show_step_id' => 0,
                                'next_session_step' => 9
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 9,
                        'step_title' => "Nice! Please type in your occupation",
                        'next_session_step' => 10,
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 2,
                                'response_text' => '',
                                'show_step_id' => 0,
                                'next_session_step' => 10
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 10,
                        'step_title' => "Nice! Please type in your permanent address",
                        'next_session_step' => 11,
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 2,
                                'response_text' => '',
                                'show_step_id' => 0,
                                'next_session_step' => 11
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 11,
                        'step_title' => "Please also tell us your physical/residential address",
                        'next_session_step' => 12,
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 2,
                                'response_text' => '',
                                'show_step_id' => 0,
                                'next_session_step' => 12
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 12,
                        'step_title' => "Awesome, please upload your medical report in either PDF,JPG or PNG formats",
                        'next_session_step' => 13,
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 2,
                                'response_text' => '',
                                'show_step_id' => 0,
                                'next_session_step' => 13
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 13,
                        'step_title' => "Great! Please also attach and invoice or receipt with all the costs you would like to claim",
                        'next_session_step' => 14,
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 2,
                                'response_text' => '',
                                'show_step_id' => 0,
                                'next_session_step' => 14
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 14,
                        'step_title' => "How much would you like to claim? please type in the amount in numbers",
                        'next_session_step' => 15,
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 2,
                                'response_text' => '',
                                'show_step_id' => 0,
                                'next_session_step' => 15
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 15,
                        'step_title' => "Are you insured under a corporate? if so reply with the corporate name. If not, reply with the word *none*",
                        'next_session_step' => 16,
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 2,
                                'response_text' => '',
                                'show_step_id' => 0,
                                'next_session_step' => 16
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 16,
                        'step_title' => "Great! Please reply with your bank name",
                        'next_session_step' => 17,
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 2,
                                'response_text' => '',
                                'show_step_id' => 0,
                                'next_session_step' => 17
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 17,
                        'step_title' => "Please also reply with your account name",
                        'next_session_step' => 18,
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 2,
                                'response_text' => '',
                                'show_step_id' => 0,
                                'next_session_step' => 18
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 17,
                        'step_title' => "Please also reply with your account name",
                        'next_session_step' => 18,
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 2,
                                'response_text' => '',
                                'show_step_id' => 0,
                                'next_session_step' => 18
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 18,
                        'step_title' => "Great! Please type in your account number",
                        'next_session_step' => 19,
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 2,
                                'response_text' => '',
                                'show_step_id' => 0,
                                'next_session_step' => 19
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 19,
                        'step_title' => "What is your bank branch name?",
                        'next_session_step' => 20,
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 2,
                                'response_text' => '',
                                'show_step_id' => 0,
                                'next_session_step' => 20
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 19,
                        'step_title' => "Please also type in your banks's Swift Code",
                        'next_session_step' => 20,
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 2,
                                'response_text' => '',
                                'show_step_id' => 0,
                                'next_session_step' => 20
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 20,
                        'step_title' => "Please also type in your banks's Swift Code",
                        'next_session_step' => 21,
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 2,
                                'response_text' => '',
                                'show_step_id' => 0,
                                'next_session_step' => 21
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 21,
                        'step_title' => "Finally, please type in the full name of the beneficiary",
                        'next_session_step' => 22,
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 2,
                                'response_text' => '',
                                'show_step_id' => 0,
                                'next_session_step' => 22
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 22,
                        'step_title' => "Please also type in the beneficiaries phone number",
                        'next_session_step' => 23,
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 2,
                                'response_text' => '',
                                'show_step_id' => 0,
                                'next_session_step' => 23
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 23,
                        'step_title' => "Great! By continuing, you consent that your information may be shared with regulatory authorities upon request.",
                        'next_session_step' => 24,
                        'reply_type' => 'inline_buttons',
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 2,
                                'response_text' => 'Agree and continue',
                                'show_step_id' => 0,
                                'next_session_step' => 24
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 24,
                        'step_title' => "Awesome! Your claim has been successfully submitted. You will receive information about your claim shortly\nThank your for choosing AAR insurance",
                        'next_session_step' => 25,
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 2,
                                'response_text' => '',
                                'show_step_id' => 0,
                                'next_session_step' => 25
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 26,
                        'step_title' => "Hello! Unfortunately we are unable to process your claim as an admission was not reported. Our sincere apologies for the inconvenience",
                        'next_session_step' => 27,
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 2,
                                'response_text' => '',
                                'show_step_id' => 0,
                                'next_session_step' => 27
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 28,
                        'step_title' => "Here are the status of the claims you have filed\n\n",
                        'next_session_step' => 29,
                        'with_input' => 0,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'response_text' => "You have not filed any claims",
                                'show_step_id' => 0,
                                'next_session_step' => 29
                            ]
                        ]
                    ],
                ]
            ],
            [
                'session_name' => 'pay',
                'channel' => 'WA',
                'session_switching' => 1,
                'session_key_word' => 5,
                'session_steps' => [
                    [
                        'channel' => 'WA',
                        'is_initial_step' => true,
                        'session_step' => 0,
                        'step_title' => "",
                        'next_session_step' => 2,
                        'service_methods' => [
                            [
                                'method_name' => 'queryAndValidateMembershipNo',
                                'method_type' => 'validate',
                            ],
                            [
                                'method_name' => 'updateWhatsAppMembershipNo',
                                'method_type' => 'update_membership_no',
                            ],
                            [
                                'method_name' => 'sendOtp',
                                'method_type' => 'send_otp',
                            ]
                        ],
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'show_step_id' => 0,
                                'response_text' => 'Great! 👍🏾. Type your membership number in this format 👉🏾 *E.g. KE12345000 or AK12345000*',
                                'next_session_step' => 2
                            ],
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 2,
                        'step_title' => "Hi profilename 👋🏽. Please type in the OTP sent to you via SMS.\n\n",
                        'next_session_step' => 3,
                        'service_methods' => [
                            [
                                'method_name' => 'confirmOtp',
                                'method_type' => 'confirm_otp',
                            ],
//                            [
//                                'method_name' => 'calculatePremiumBalance',
//                                'method_type' => 'calculate_premium',
//                            ]
                        ],
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'show_step_id' => 0,
                                'response_text' => '',
                                'next_session_step' => 3
                            ],
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 3,
                        'step_title' => "Hi profilename 👋🏽. How would you like to pay?\n\n",
                        'next_session_step' => 4,
                        'reply_type' => 'inline_buttons',
                        'service_methods' => [
                            [
                                'method_name' => 'makePayment',
                                'method_type' => 'make_payment',
                            ],
                            [
                                'method_name' => 'checkMpesaNumber',
                                'method_type' => 'check_mpesa_number',
                            ]
                        ],
                        'with_input' => 0,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'show_step_id' => 1,
                                'response_text' => 'Pay with Mpesa',
                                'next_session_step' => 4
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 2,
                                'show_step_id' => 1,
                                'response_text' => 'Not Now',
                                'next_session_step' => 4
                            ],
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 4,
                        'step_title' => "Please enter your Mpesa number e.g 0712345678",
                        'next_session_step' => 5,
                        'service_methods' => [
                            [
                                'method_name' => 'storeMpesaNumber',
                                'method_type' => 'store_mpesa_number',
                            ]
                        ],
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'show_step_id' => 0,
                                'response_text' => '',
                                'next_session_step' => 5
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 5,
                        'step_title' => "How much would you like to pay?",
                        'next_session_step' => 6,
                        'service_methods' => [
                            [
                                'method_name' => 'paymentAmount',
                                'method_type' => 'payment_amount',
                            ]
                        ],
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'show_step_id' => 0,
                                'response_text' => '',
                                'next_session_step' => 6
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 6,
                        'step_title' => "Please wait to enter Mpesa pin, and finally check for an Mpesa message confirmation",
                        'next_session_step' => 7,
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'show_step_id' => 0,
                                'response_text' => '',
                                'next_session_step' => 7
                            ]
                        ]
                    ]
                ]
            ],
            [
                'session_name' => 'statement',
                'channel' => 'WA',
                'session_switching' => 1,
                'session_key_word' => 6,
                'session_steps' => [
                    [
                        'channel' => 'WA',
                        'is_initial_step' => true,
                        'session_step' => 0,
                        'service_methods' => [
                            [
                                'method_name' => 'queryAndValidateMembershipNo',
                                'method_type' => 'validate',
                            ],
                            [
                                'method_name' => 'updateWhatsAppMembershipNo',
                                'method_type' => 'update_membership_no',
                            ],
                            [
                                'method_name' => 'sendOtp',
                                'method_type' => 'send_otp',
                            ]
                        ],
                        'step_title' => "",
                        'next_session_step' => 1,
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'show_step_id' => 0,
                                'response_text' => 'Great! 👍🏾. Type your membership number in this format 👉🏾 *E.g. KE12345000 or AK12345000*',
                                'next_session_step' => 1
                            ],
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 1,
                        'service_methods' => [
                            [
                                'method_name' => 'confirmOtp',
                                'method_type' => 'confirm_otp',
                            ],
                            [
                                'method_name' => 'queryPolicyStatement',
                                'method_type' => 'query_policy_statement',
                            ]
                        ],
                        'step_title' => "",
                        'next_session_step' => 2,
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'show_step_id' => 0,
                                'response_text' => "Hi profilename 👋🏽. Please type in the OTP sent to you via SMS.\n\n",
                                'next_session_step' => 2
                            ],
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 2,
                        'step_title' => "Here are your premium statements",
                        'next_session_step' => 3,
                        'response_source' => 'function',
                        'response_function' => 'queryPolicyStatement',
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'show_step_id' => 0,
                                'response_text' => '',
                                'next_session_step' => 3
                            ],
                        ]
                    ]
                ]
            ],
            [
                'session_name' => 'quote',
                'channel' => 'WA',
                'session_switching' => 1,
                'session_key_word' => 7,
                'session_steps' => [
                    [
                        'channel' => 'WA',
                        'is_initial_step' => true,
                        'session_step' => 0,
                        'step_title' => "Hi profilename 👋🏽. Letʼs get you a quick quote for *Individual* and *family* medical insurance. Would you like a *per person cover* or *Family Shared cover*?\n\nPlease choose an option below👇🏽\n\n",
                        'next_session_step' => 62,
                        'reply_type' => 'inline_buttons',
                        'service_methods' => [
                            [
                                'method_name' => 'saveQuote',
                                'method_type' => 'save_quote',
                            ],
                        ],
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'show_step_id' => 1,
                                'response_text' => 'Per person cover',
                                'next_session_step' => 62
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 2,
                                'show_step_id' => 1,
                                'response_text' => 'Family Shared Cover',
                                'next_session_step' => 62
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 62,
                        'step_title' => "Please type in your email address",
                        'next_session_step' => 64,
                        'service_methods' => [
                            [
                                'method_name' => 'saveQuote',
                                'method_type' => 'save_quote_email',
                            ]
                        ],
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'show_step_id' => 0,
                                'response_text' => '',
                                'next_session_step' => 64
                            ],
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 64,
                        'step_title' => "Please select your preferred cover type.\n\n",
                        'next_session_step' => 65,
                        'reply_type' => 'list',
                        'service_methods' => [
                            [
                                'method_name' => 'saveQuote',
                                'method_type' => 'save_quote_cover_type',
                            ]
                        ],
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'show_step_id' => 1,
                                'response_text' => 'Platinum',
                                'next_session_step' => 65
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 2,
                                'show_step_id' => 1,
                                'response_text' => 'Gold',
                                'next_session_step' => 65
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 3,
                                'show_step_id' => 1,
                                'response_text' => 'Silver Plus',
                                'next_session_step' => 65
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 4,
                                'show_step_id' => 1,
                                'response_text' => 'Silver',
                                'next_session_step' => 65
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 5,
                                'show_step_id' => 1,
                                'response_text' => 'Bronze',
                                'next_session_step' => 65
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 6,
                                'show_step_id' => 1,
                                'response_text' => 'Cover me',
                                'next_session_step' => 65
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 65,
                        'step_title' => "Great. Now letʼs add the members to be insured. Please type in the first name",
                        'next_session_step' => 66,
                        'service_methods' => [
                            [
                                'method_name' => 'saveQuote',
                                'method_type' => 'save_quote_first_name',
                            ]
                        ],
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'show_step_id' => 0,
                                'response_text' => '',
                                'next_session_step' => 66
                            ],
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 66,
                        'step_title' => "Please type in the second name",
                        'next_session_step' => 67,
                        'service_methods' => [
                            [
                                'method_name' => 'saveQuote',
                                'method_type' => 'save_quote_second_name',
                            ]
                        ],
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'show_step_id' => 0,
                                'response_text' => '',
                                'next_session_step' => 67
                            ],
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 67,
                        'step_title' => "Please type in the last name",
                        'next_session_step' => 68,
                        'service_methods' => [
                            [
                                'method_name' => 'saveQuote',
                                'method_type' => 'save_quote_last_name',
                            ]
                        ],
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'show_step_id' => 0,
                                'response_text' => '',
                                'next_session_step' => 68
                            ],
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 68,
                        'step_title' => "Please select the age bracket\n\n",
                        'next_session_step' => 69,
                        'reply_type' => 'list',
                        'service_methods' => [
                            [
                                'method_name' => 'saveQuote',
                                'method_type' => 'save_quote_age_bracket',
                            ]
                        ],
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'show_step_id' => 1,
                                'response_text' => '0-17',
                                'next_session_step' => 69
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 2,
                                'show_step_id' => 1,
                                'response_text' => '18-30',
                                'next_session_step' => 69
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 3,
                                'show_step_id' => 1,
                                'response_text' => '31-40',
                                'next_session_step' => 69
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 4,
                                'show_step_id' => 1,
                                'response_text' => '41-50',
                                'next_session_step' => 69
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 5,
                                'show_step_id' => 1,
                                'response_text' => '51-64',
                                'next_session_step' => 69
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 69,
                        'step_title' => "Please select your gender\n\n",
                        'next_session_step' => 70,
                        'reply_type' => 'inline_buttons',
                        'service_methods' => [
                            [
                                'method_name' => 'saveQuote',
                                'method_type' => 'save_quote_gender',
                            ],
//                            [
//                                'method_name' => 'saveQuote',
//                                'method_type' => 'save_quote_inpatient',
//                            ]
                        ],
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'show_step_id' => 1,
                                'response_text' => 'Male',
                                'next_session_step' => 70
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 2,
                                'show_step_id' => 1,
                                'response_text' => 'Female',
                                'next_session_step' => 70
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 70,
                        'step_title' => "Are you interested in out-patient cover?\n\n",
                        'next_session_step' => 71,
                        'reply_type' => 'inline_buttons',
                        'service_methods' => [
                            [
                                'method_name' => 'saveQuote',
                                'method_type' => 'save_quote_out_patient',
                            ]
                        ],
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'show_step_id' => 1,
                                'response_text' => 'Yes',
                                'next_session_step' => 71
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 2,
                                'show_step_id' => 1,
                                'response_text' => 'No',
                                'next_session_step' => 71
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 71,
                        'step_title' => "Please select the out patient rate\n\n",
                        'next_session_step' => 72,
                        'reply_type' => 'list',
                        'service_methods' => [
                            [
                                'method_name' => 'saveQuote',
                                'method_type' => 'save_quote_out_patient_rate',
                            ]
                        ],
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'show_step_id' => 1,
                                'response_text' => '250,000',
                                'next_session_step' => 72
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 2,
                                'show_step_id' => 1,
                                'response_text' => '200,000',
                                'next_session_step' => 72
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 3,
                                'show_step_id' => 1,
                                'response_text' => '150,000',
                                'next_session_step' => 72
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 4,
                                'show_step_id' => 1,
                                'response_text' => '100,000',
                                'next_session_step' => 72
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 5,
                                'show_step_id' => 1,
                                'response_text' => '75,000',
                                'next_session_step' => 72
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 6,
                                'show_step_id' => 1,
                                'response_text' => '50,000',
                                'next_session_step' => 72
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 72,
                        'step_title' => "Great would you like to add another member before calculating the premium?\n\n",
                        'next_session_step' => 73,
                        'reply_type' => 'inline_buttons',
                        'service_methods' => [
                            [
                                'method_name' => 'saveQuote',
                                'method_type' => 'close_quote',
                            ]
                        ],
                        'with_input' => 0,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'show_step_id' => 1,
                                'response_text' => 'Yes',
                                'next_session_step' => 64
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 2,
                                'show_step_id' => 1,
                                'response_text' => 'No',
                                'next_session_step' => 72
                            ]
                        ]
                    ]
                ]
            ],
            [
                'session_name' => 'letter',
                'channel' => 'WA',
                'session_switching' => 1,
                'session_key_word' => 8,
                'session_steps' => [
                    [
                        'channel' => 'WA',
                        'is_initial_step' => true,
                        'session_step' => 0,
                        'step_title' => '',
                        'next_session_step' => 2,
                        'service_methods' => [
                            [
                                'method_name' => 'queryAndValidateMembershipNo',
                                'method_type' => 'validate',
                            ],
                            [
                                'method_name' => 'updateWhatsAppMembershipNo',
                                'method_type' => 'update_membership_no',
                            ],
                            [
                                'method_name' => 'sendOtp',
                                'method_type' => 'send_otp',
                            ]
                        ],
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'show_step_id' => 0,
                                'response_text' => 'Great! 👍🏾. Type your membership number in this format 👉🏾 *E.g. KE12345000 or AK12345000*',
                                'next_session_step' => 2
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 2,
                        'step_title' => '',
                        'next_session_step' => 3,
                        'service_methods' => [
                            [
                                'method_name' => 'confirmOtp',
                                'method_type' => 'confirm_otp',
                            ]
                        ],
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 3,
                                'show_step_id' => 0,
                                'response_text' => "Hi profilename 👋🏽. Please type in the OTP sent to you via SMS.\n\n",
                                'next_session_step' => 3
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => true,
                        'session_step' => 3,
                        'step_title' => "Hi profilename 👋🏽. Which letter would you like?\n\nChose one below👇🏽.\n\n",
                        'next_session_step' => 4,
                        'service_methods' => [
                            [
                                'method_name' => 'selectLetter',
                                'method_type' => 'select_letter',
                            ]
                        ],
                        'reply_type' => 'inline_buttons',
                        'with_input' => 0,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'show_step_id' => 1,
                                'response_text' => 'Travel letter',
                                'next_session_step' => 4
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 2,
                                'show_step_id' => 1,
                                'response_text' => 'Embassy letter',
                                'next_session_step' => 4
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 3,
                                'show_step_id' => 1,
                                'response_text' => 'Confirmation letter',
                                'next_session_step' => 4
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 4,
                        'step_title' => "Please type in your date of travel, formatted as yyyy-mm-dd\n\n",
                        'next_session_step' => 5,
                        'service_methods' => [
                            [
                                'method_name' => 'saveLetter',
                                'method_type' => 'save_travel_date',
                            ]
                        ],
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'show_step_id' => 0,
                                'response_text' => '',
                                'next_session_step' => 5
                            ],
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 5,
                        'step_title' => "Please type in your return date, formatted as yyyy-mm-dd\n\n",
                        'next_session_step' => 6,
                        'service_methods' => [
                            [
                                'method_name' => 'saveLetter',
                                'method_type' => 'save_return_date',
                            ]
                        ],
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'show_step_id' => 0,
                                'response_text' => '',
                                'next_session_step' => 6
                            ],
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 6,
                        'step_title' => "Please type in your destination\n\n",
                        'next_session_step' => 7,
                        'service_methods' => [
                            [
                                'method_name' => 'saveLetter',
                                'method_type' => 'save_destination',
                            ],
                            [
                                'method_name' => 'downloadLetter',
                                'method_type' => 'download_letter',
                            ]
                        ],
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'show_step_id' => 0,
                                'response_text' => '',
                                'next_session_step' => 7
                            ],
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 7,
                        'step_title' => "Please download your letter below\n\n",
                        'next_session_step' => 8,
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'show_step_id' => 0,
                                'response_text' => '',
                                'next_session_step' => 8
                            ],
                        ]
                    ]
                ]
            ],
            [
                'session_name' => 'buy',
                'channel' => 'WA',
                'session_switching' => 1,
                'session_key_word' => 9,
                'session_steps' => [
                    [
                        'channel' => 'WA',
                        'is_initial_step' => true,
                        'session_step' => 0,
                        'step_title' => "Hi profilename 👋🏽, here is a list of the products we offer\nPlease reply with one that you would love to purchase e.g 1\n\n",
                        'next_session_step' => 1,
//                        'reply_type' => 'list',
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'show_step_id' => 1,
                                'response_text' => "Individual medical\nhttps://buyonline.aar-insurance.com/medical",
                                'next_session_step' => 1
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 2,
                                'show_step_id' => 1,
                                'response_text' => "Family medical plan\nhttps://buyonline.aar-insurance.com/medical",
                                'next_session_step' => 1
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 3,
                                'show_step_id' => 1,
                                'response_text' => "Personal accident\nhttps://buyonline.aar-insurance.com/pa/getstarted",
                                'next_session_step' => 1
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 4,
                                'show_step_id' => 1,
                                'response_text' => "Travel insurance\nhttps://aar-insurance.com/t_v1/travel",
                                'next_session_step' => 1
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 5,
                                'show_step_id' => 1,
                                'response_text' => "Home owners cover-Coming Soon!",
                                'next_session_step' => 1
                            ]
                        ]
                    ]
                ]
            ],
            [
                'session_name' => 'customer',
                'channel' => 'WA',
                'session_switching' => 1,
                'session_key_word' => 10,
                'session_steps' => [
                    [
                        'channel' => 'WA',
                        'is_initial_step' => true,
                        'session_step' => 0,
                        'step_title' => "Hi profilename 👋🏽, How may we help you? Please choose an option below👇🏽\n\n",
                        'next_session_step' => 4,
                        'reply_type' => 'inline_buttons',
                        'service_methods' => [
                            [
                                'method_name' => 'handleCustomerCare',
                                'method_type' => 'handle_customer_care',
                            ]
                        ],
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'show_step_id' => 1,
                                'response_text' => 'Request for callback',
                                'next_session_step' => 4
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 2,
                                'show_step_id' => 1,
                                'response_text' => 'Chat with an agent',
                                'next_session_step' => 5
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 4,
                        'step_title' => "Please reply with your preferred time for a callback\n\n",
                        'next_session_step' => 6,
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'show_step_id' => 0,
                                'response_text' => '',
                                'next_session_step' => 6
                            ],
                        ]
                    ]
                ]
            ],
//            [
//                'session_name' => 'subscriptions',
//                'channel' => 'WA',
//                'session_switching' => 1,
//                'session_key_word' => 11,
//                'session_steps' => [
//                    [
//                        'channel' => 'WA',
//                        'is_initial_step' => true,
//                        'session_step' => 0,
//                        'step_title' => "Hey there, would you like to keep up tp date with information from AAR? Choose a subscription below\n\n",
//                        'next_session_step' => 1,
//                        'with_input' => 0,
//                        'responses' => [
//                            [
//                                'channel' => 'WA',
//                                'key_word' => 1,
//                                'show_step_id' => 1,
//                                'response_text' => 'Your monthly policy statements',
//                                'next_session_step' => 1
//                            ],
//                            [
//                                'channel' => 'WA',
//                                'key_word' => 2,
//                                'show_step_id' => 1,
//                                'response_text' => 'New product launches',
//                                'next_session_step' => 1
//                            ],
//                            [
//                                'channel' => 'WA',
//                                'key_word' => 3,
//                                'show_step_id' => 1,
//                                'response_text' => 'C.E.O Announcements',
//                                'next_session_step' => 1
//                            ]
//                        ]
//                    ],
//                    [
//                        'channel' => 'WA',
//                        'is_initial_step' => false,
//                        'session_step' => 1,
//                        'step_title' => "Subscription successful",
//                        'next_session_step' => 2,
//                        'with_input' => 1,
//                        'responses' => [
//                            [
//                                'channel' => 'WA',
//                                'key_word' => 1,
//                                'show_step_id' => 0,
//                                'response_text' => '',
//                                'next_session_step' => 2
//                            ],
//                        ]
//                    ]
//                ]
//            ]

//            [
//                'session_name' => 'osho',
//                'channel' => 'WA',
//                'session_steps' => [
//                    [
//                        'channel' => 'WA',
//                        'is_initial_step' => true,
//                        'session_step' => 0,
//                        'step_title' => "Hi there, I'm mkulima Joe, I'm here to help you get the right chemicals for for Crop protection, Animal Health, Public Health, Industrial Chemicals, Farm Equipment and so much more...\n\nTo start, please register by typing your name below",
//                        'next_session_step' => 1,
//                        'with_input' => 1,
//                        'responses' => [
//                            [
//                                'channel' => 'WA',
//                                'key_word' => 1,
//                                'response_text' => '',
//                                'show_step_id' => 0,
//                                'next_session_step' => 0
//                            ]
//                        ]
//                    ],
//                    [
//                        'channel' => 'WA',
//                        'is_initial_step' => false,
//                        'session_step' => 1,
//                        'step_title' => '',
//                        'next_session_step' => 2,
//                        'with_input' => 1,
//                        'responses' => [
//                            [
//                                'channel' => 'WA',
//                                'key_word' => 1,
//                                'show_step_id' => 0,
//                                'response_text' => 'Great, now please tell us which county you are in ?',
//                                'next_session_step' => 2
//                            ]
//                        ]
//                    ],
//                    [
//                        'channel' => 'WA',
//                        'is_initial_step' => false,
//                        'session_step' => 2,
//                        'step_title' => "Welcome to Osho Chemicals. How may we help you? Please choose an option below to start\n\n",
//                        'next_session_step' => 3,
//                        'with_input' => 0,
//                        'responses' => [
//                            [
//                                'channel' => 'WA',
//                                'key_word' => 1,
//                                'show_step_id' => 1,
//                                'response_text' => 'Enquiry',
//                                'next_session_step' => 3
//                            ],
//                            [
//                                'channel' => 'WA',
//                                'key_word' => 2,
//                                'show_step_id' => 1,
//                                'response_text' => 'Find an Agrovet/Agro dealer',
//                                'next_session_step' => 11
//                            ],
//                            [
//                                'channel' => 'WA',
//                                'key_word' => 3,
//                                'show_step_id' => 1,
//                                'response_text' => 'Contact Osho Chemicals Industry Ltd',
//                                'next_session_step' => 15
//                            ]
//                        ]
//                    ],
//                    [
//                        'channel' => 'WA',
//                        'is_initial_step' => false,
//                        'session_step' => 2,
//                        'step_title' => "Welcome to Osho Chemicals. How may we help you? Please choose an option below to start\n\n",
//                        'next_session_step' => 3,
//                        'with_input' => 0,
//                        'responses' => [
//                            [
//                                'channel' => 'WA',
//                                'key_word' => 1,
//                                'show_step_id' => 1,
//                                'response_text' => 'Enquiry',
//                                'next_session_step' => 3
//                            ],
//                            [
//                                'channel' => 'WA',
//                                'key_word' => 2,
//                                'show_step_id' => 1,
//                                'response_text' => 'Find an Agrovet/Agro dealer',
//                                'next_session_step' => 11
//                            ],
//                            [
//                                'channel' => 'WA',
//                                'key_word' => 3,
//                                'show_step_id' => 1,
//                                'response_text' => 'Contact Osho Chemicals Industry Ltd',
//                                'next_session_step' => 15
//                            ]
//                        ]
//                    ],
//                    [
//                        'channel' => 'WA',
//                        'is_initial_step' => false,
//                        'session_step' => 3,
//                        'step_title' => "Please chose an option below\n\n",
//                        'next_session_step' => 4,
//                        'with_input' => 0,
//                        'responses' => [
//                            [
//                                'channel' => 'WA',
//                                'key_word' => 1,
//                                'show_step_id' => 1,
//                                'response_text' => 'Crop disease inquiry',
//                                'next_session_step' => 4
//                            ],
//                            [
//                                'channel' => 'WA',
//                                'key_word' => 2,
//                                'show_step_id' => 1,
//                                'response_text' => 'Product inquiry',
//                                'next_session_step' => 4
//                            ]
//                        ]
//                    ],
//                    [
//                        'channel' => 'WA',
//                        'is_initial_step' => false,
//                        'session_step' => 4,
//                        'step_title' => "What crop would you like to know about?\n\n",
//                        'next_session_step' => 5,
//                        'with_input' => 0,
//                        'responses' => [
//                            [
//                                'channel' => 'WA',
//                                'key_word' => 1,
//                                'show_step_id' => 1,
//                                'response_text' => "Tomatoes",
//                                'next_session_step' => 5
//                            ],
//                            [
//                                'channel' => 'WA',
//                                'key_word' => 2,
//                                'show_step_id' => 1,
//                                'response_text' => "Maize",
//                                'next_session_step' => 5
//                            ]
//                        ]
//                    ],
//                    [
//                        'channel' => 'WA',
//                        'is_initial_step' => false,
//                        'session_step' => 5,
//                        'step_title' => "Please chose an option below\n\n",
//                        'next_session_step' => 6,
//                        'with_input' => 0,
//                        'responses' => [
//                            [
//                                'channel' => 'WA',
//                                'key_word' => 1,
//                                'show_step_id' => 1,
//                                'response_text' => "Whiteflies",
//                                'next_session_step' => 6
//                            ],
//                            [
//                                'channel' => 'WA',
//                                'key_word' => 2,
//                                'show_step_id' => 1,
//                                'response_text' => "Aphids",
//                                'next_session_step' => 5
//                            ],
//                            [
//                                'channel' => 'WA',
//                                'key_word' => 3,
//                                'show_step_id' => 1,
//                                'response_text' => "Thrips",
//                                'next_session_step' => 5
//                            ]
//                        ]
//                    ],
//                    [
//                        'channel' => 'WA',
//                        'is_initial_step' => false,
//                        'session_step' => 6,
//                        'step_title' => "To eradicate Whiteflies, Use Alpha degree (20mls/20L of water).\n\nAre you satisfied with the response you have received?\n\nPlease reply with an option below\n\n",
//                        'next_session_step' => 7,
//                        'with_input' => 0,
//                        'responses' => [
//                            [
//                                'channel' => 'WA',
//                                'key_word' => 1,
//                                'show_step_id' => 1,
//                                'response_text' => "Yes",
//                                'next_session_step' => 7
//                            ],
//                            [
//                                'channel' => 'WA',
//                                'key_word' => 2,
//                                'show_step_id' => 1,
//                                'response_text' => "No",
//                                'next_session_step' => 8
//                            ]
//                        ]
//                    ],
//                    [
//                        'channel' => 'WA',
//                        'is_initial_step' => false,
//                        'session_step' => 7,
//                        'step_title' => "Thank you for being our valued customer",
//                        'next_session_step' => 9,
//                        'with_input' => 0,
//                        'responses' => [
//                            [
//                                'channel' => 'WA',
//                                'key_word' => 1,
//                                'show_step_id' => 0,
//                                'response_text' => "",
//                                'next_session_step' => 9
//                            ]
//                        ]
//                    ],
//                    [
//                        'channel' => 'WA',
//                        'is_initial_step' => false,
//                        'session_step' => 8,
//                        'step_title' => "To speak to an agent, please send us a direct email on customercare@oshochem.com,\n\nor call us on (+254) 0711 045 000 or send us a message on 20560",
//                        'next_session_step' => 10,
//                        'with_input' => 0,
//                        'responses' => [
//                            [
//                                'channel' => 'WA',
//                                'key_word' => 1,
//                                'show_step_id' => 0,
//                                'response_text' => "",
//                                'next_session_step' => 10
//                            ]
//                        ]
//                    ],
//                    [
//                        'channel' => 'WA',
//                        'is_initial_step' => false,
//                        'session_step' => 11,
//                        'step_title' => "Are you a Stockist?\n\n",
//                        'next_session_step' => 12,
//                        'with_input' => 0,
//                        'responses' => [
//                            [
//                                'channel' => 'WA',
//                                'key_word' => 1,
//                                'show_step_id' => 1,
//                                'response_text' => "Yes",
//                                'next_session_step' => 12
//                            ],
//                            [
//                                'channel' => 'WA',
//                                'key_word' => 2,
//                                'show_step_id' => 1,
//                                'response_text' => "No",
//                                'next_session_step' => 15
//                            ]
//                        ]
//                    ],
//                    [
//                        'channel' => 'WA',
//                        'is_initial_step' => false,
//                        'session_step' => 12,
//                        'step_title' => "Please chose your county below to get an Agrovet/Agrodealer.\n\n",
//                        'next_session_step' => 13,
//                        'with_input' => 0,
//                        'responses' => [
//                            [
//                                'channel' => 'WA',
//                                'key_word' => 1,
//                                'show_step_id' => 1,
//                                'response_text' => "Bomet",
//                                'next_session_step' => 13
//                            ]
//                        ]
//                    ],
//                    [
//                        'channel' => 'WA',
//                        'is_initial_step' => false,
//                        'session_step' => 13,
//                        'step_title' => "Here is a list of Agrovet Suppliers in Bomet County\n\n",
//                        'next_session_step' => 15,
//                        'with_input' => 0,
//                        'responses' => [
//                            [
//                                'channel' => 'WA',
//                                'key_word' => 1,
//                                'show_step_id' => 1,
//                                'response_text' => "SAI AGROVET LTD-+254703535252",
//                                'next_session_step' => 15
//                            ],
//                            [
//                                'channel' => 'WA',
//                                'key_word' => 2,
//                                'show_step_id' => 1,
//                                'response_text' => "SOT PHARMACY-+254720283240",
//                                'next_session_step' => 15
//                            ],
//                            [
//                                'channel' => 'WA',
//                                'key_word' => 3,
//                                'show_step_id' => 1,
//                                'response_text' => "ISENYA FARM INPUT STORES-+254720344266",
//                                'next_session_step' => 15
//                            ],
//                            [
//                                'channel' => 'WA',
//                                'key_word' => 4,
//                                'show_step_id' => 1,
//                                'response_text' => "SHRIJI AGROVET LTD-+254723250397",
//                                'next_session_step' => 15
//                            ],
//                            [
//                                'channel' => 'WA',
//                                'key_word' => 5,
//                                'show_step_id' => 1,
//                                'response_text' => "MEDS PHARMACEUTICALS LTD-+254723478529",
//                                'next_session_step' => 15
//                            ],
//                            [
//                                'channel' => 'WA',
//                                'key_word' => 6,
//                                'show_step_id' => 1,
//                                'response_text' => "Are you satisfied with the response you have received? - Yes",
//                                'next_session_step' => 15
//                            ],
//                            [
//                                'channel' => 'WA',
//                                'key_word' => 7,
//                                'show_step_id' => 1,
//                                'response_text' => "Are you satisfied with the response you have received? - No",
//                                'next_session_step' => 15
//                            ]
//                        ]
//                    ],
//                    [
//                        'channel' => 'WA',
//                        'is_initial_step' => false,
//                        'session_step' => 15,
//                        'step_title' => "Hi! you can contact us through the details below\n\nPhysical address: Osho complex, sasio road, off lunga lunga industrial area, Nairobi Kenya\n\nTel: (+254) 0711 045000/0732167000/020 321000\n\nEmail:oshochem@oshochem.com\n\nSMS:20560\n\nWebsite Url:http://oshochem.com\n\nFacebook:https://web.facebook.com/OshoChem\n\nTwitter url:https://twitter.com/Oshochem",
//                        'next_session_step' => 16,
//                        'with_input' => 0,
//                        'responses' => [
//                            [
//                                'channel' => 'WA',
//                                'key_word' => 1,
//                                'show_step_id' => 0,
//                                'response_text' => "",
//                                'next_session_step' => 16
//                            ]
//                        ]
//                    ]
//                ]
//            ]
        ];

        foreach ($bot_sessions as $bot_session) {

            if (!BotSession::where('session_name', $bot_session['session_name'])
                ->where('channel', $bot_session['channel'])
                ->exists()) {

                $bot_session_model = new BotSession();

                $bot_session_model->session_name = $bot_session['session_name'];
                $bot_session_model->session_key_word = $bot_session['session_key_word'];
                $bot_session_model->channel = $bot_session['channel'];

                $bot_session_model->save();
            } else {

                $bot_session_model = BotSession::where('session_name', $bot_session['session_name'])
                    ->where('channel', $bot_session['channel'])
                    ->first();
            }

            foreach ($bot_session['session_steps'] as $session_step) {

                if (!BotSessionStep::where('session_step_key', $session_step['session_step'])
                    ->where('bot_session_id', $bot_session_model->id)
                    ->where('channel', $bot_session['channel'])
                    ->exists()) {

                    $bot_session_step = new BotSessionStep();

                    $bot_session_step->bot_session_id = $bot_session_model->id;
                    $bot_session_step->session_step_key = $session_step['session_step'];
                    $bot_session_step->next_session_step_key = $session_step['next_session_step'];
                    $bot_session_step->response_source = isset($session_step['response_source']) ? $session_step['response_source'] : 'app';
                    $bot_session_step->response_function = isset($session_step['response_function']) ? $session_step['response_function'] : null;
                    $bot_session_step->reply_type = isset($session_step['reply_type']) ? $session_step['reply_type'] : null;
                    $bot_session_step->channel = $session_step['channel'];
                    $bot_session_step->step_title = $session_step['step_title'];
                    $bot_session_step->is_initial_step = $session_step['is_initial_step'];
                    $bot_session_step->with_input = $session_step['with_input'];
                    $bot_session_step->service_methods = array_key_exists('service_methods', $session_step) ? json_encode($session_step['service_methods']) : null;


                    $bot_session_step->save();
                } else {

                    $bot_session_step = BotSessionStep::where('session_step_key', $session_step['session_step'])
                        ->where('channel', $bot_session['channel'])
                        ->first();
                }

                foreach ($session_step['responses'] as $response) {

                    if (!BotResponse::where('response_text', $response['response_text'])
                        ->where('bot_session_step_id', $bot_session_step->id)
                        ->where('channel', $bot_session['channel'])
                        ->exists()) {

                        $bot_response = new BotResponse();

                        $bot_response->channel = $response['channel'];
                        $bot_response->bot_session_id = $bot_session_model->id;
                        $bot_response->bot_session_step_id = $bot_session_step->id;
                        $bot_response->key_word = $response['key_word'];
                        $bot_response->response_text = $response['response_text'];
                        $bot_response->show_step_id = $response['show_step_id'];
                        $bot_response->next_session_step = $response['next_session_step'];

                        $bot_response->save();
                    }
                }
            }
        }
    }
}