<img alt="logo" align="right" width="100" height="100" src="./docs/images/logo.png">
GitHub: https://github.com/jjrohrer/RobustChat

Official Docs: https://jjrohrer.github.io/RobustChat/
 
### Summary
A complete openai-like chat package you can use in your own projects, 
with an emphasis on good-enough for startup MVP-style work, plus leaning into 
educating fellow developers along the way.

### QuickStart Local Playground
see: [Readme.QuickPlayground.md](Readme.QuickPlayground.md)

### QuickStart for your App
see: [Readme.QuickPlayground.md](Readme.QuickPlayground.md)

### Mission
Create an open-ai style chat library suitable for the PHP to mostly reusable in their own applications, including a well-refined UI.

We will emphasize the following
* Understandable Code
    * Self-documented code
    * Orientation document(s) that explain how the code fits together
* Learning Opportunities
    * Emphasizing educating other developers on how come up-to-speed on ai and this package
* Flexible Deployment
    * Lots of examples of how to customize for your own use-cases (tweaking the UI, turning off features, etc.)
    * Compatability with Laravel and Symfony
    * Good test cases and development cases
    * Production-ready-flags (like, removing some development-only features)

### Tech Stack
* Laravel 10+ (and Symfony, in future)
* Tailwind
* Livewire 3 + Alpine 3
* OpenAi API
* https://github.com/orhanerday/open-ai  (and https://github.com/openai-php/client, in future)

### Motivation
This started as an offshoot of making a chat-like WebApp for interacting with AIs in the business-education space. After getting some proof-of-concept going, I found the edge-details around implementing streaming and reactive UI was starting to get tricky, leading to a potential re-architecting of the app. This was going to stretch my own knowledge, but it also could become an opportunity for me to better engage the community, and even give back a bit.

### Roadmap

#### Stage 1 (Basics)
* [X] Useful Links
* [X] Hello World with API to openAi (blocking)
* [ ] Hello World with API to openAi (streaming)
* [ ] Hello World input box
* [X] QuickStart for local playground
* [X] GitHub Pages
#### Stage 2 (Chat)
* [ ] Onto packagist
* [ ] QuickStart for Apps
* [ ] Quick Model look-up constants
* [ ] Multi-Bubble chat stream
* [ ] Instant submit and appropriate scrolling
* [ ] Get EtGrok working for showing code samples
* [ ] Figure out how to do Laravel Examples (without having to symlink into existing install)
#### Stage 3 
* ( ) Each bubble with ability to show extra details (like, debug hints)
* [ ] Proper scrolling (re-scroll upon submit, and indicate scroll on response if scrolled up)
* [ ] Scroll window, not whole page (so submit stays on-screen)
#### Stage 4
* [ ] Customizable UI
* [ ] Ensure lots of stuff not included on production
* [ ] Make sure the examples work on your local machine (and people know how to make that happen)
#### Stage 5
* [ ] FilamentPHP DevCheck Card


### PHP Evangelization
Python & REACT get most of the love out in the real-world. Showing nicely-refined UI with LLMs is a nice way to for PHP to properly reclaim its appropriate glory. More importantly, we believe a core value of PHP has been its supportive community and well-documented projects - this is an opportunity to continue this.

### Personal Backstory
I've developed php on-and-off since 2002-ish. Most of my projects have been fairly private, so this is my attempt to engage more publically.

### Useful Links
* [Page -o- Links](./docs/links.md)