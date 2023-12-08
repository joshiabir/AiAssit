<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\Attributes\On;

class Chatbox extends Component
{
    public $message = '';
    public $thread;
    public $datas = '';
    public $status = '';
    public $run_id;
    public $mold = FALSE;
    protected $listeners = ['status_update' => 'render'];

    public function mount($thread)
    {
        $this->thread = $thread;
    }
    public function send()
    {
        $response = Http::withHeaders([
            'Content-Type' => ' application/json',
            'Authorization' => "Bearer " . env('OPEN_AI') . "",
            "OpenAI-Beta" => "assistants=v1",
        ])->post("https://api.openai.com/v1/threads/" . $this->thread . "/messages", ["role" => "user", "content" => $this->message]);
        $res = json_decode($response);
        $this->message = '';
        $response = Http::withHeaders([
            'Content-Type' => ' application/json',
            'Authorization' => "Bearer " . env('OPEN_AI') . "",
            "OpenAI-Beta" => "assistants=v1",
        ])->get("https://api.openai.com/v1/threads/" . $this->thread . "/messages");
        $res = json_decode($response);
        $data = $res->data;
        $this->datas = array_reverse($data, true);

        $response = Http::withHeaders([
            'Content-Type' => ' application/json',
            'Authorization' => "Bearer " . env('OPEN_AI') . "",
            "OpenAI-Beta" => "assistants=v1",
        ])->post("https://api.openai.com/v1/threads/" . $this->thread . "/runs", ["assistant_id" => "asst_3zYVhQaOyFPlyjburVbttjUo"]);
        $res = json_decode($response);
        $this->status = $res->status;
        $this->run_id = $res->id;
    }

    public function render()
    {
        while ($this->status != '' && $this->status != 'completed') {
            $response = Http::withHeaders([
                'Content-Type' => ' application/json',
                'Authorization' => "Bearer ".env('OPEN_AI')."",
                "OpenAI-Beta" => "assistants=v1",
            ])->get("https://api.openai.com/v1/threads/" . $this->thread . "/runs//" . $this->run_id);
            $res = json_decode($response);
            $this->status = $res->status;
            sleep(0.05);
        }

        if ($this->status == "completed" || $this->status == "") {
            $response = Http::withHeaders([
                'Content-Type' => ' application/json',
                'Authorization' => "Bearer ".env('OPEN_AI')."",
                "OpenAI-Beta" => "assistants=v1",
            ])->get("https://api.openai.com/v1/threads/" . $this->thread . "/messages");
            $res = json_decode($response);
            $data = $res->data;
            $this->datas = array_reverse($data, true);
            $this->mold = FALSE;
        }
        return view('livewire.chatbox');
    }
}
