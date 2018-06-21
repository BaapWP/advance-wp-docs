# advance-wp-docs
An advanced documentation plugin for WordPress themes &amp; plugins.

## Problem
Maintaining product documentation can be a whole lot of hassle:
 
 * You have to keep track of what feature changed and needs to be documented.
 * You have to update screenshots manually.
 
If you are really particular about keeping documentation up-to-date, you have to factor in complicated workflows and man-hours. This process involves heavy human involvement and hence can be really error-prone.

## Solution

### Tools

[Puppeteer](https://developers.google.com/web/tools/puppeteer/)
 
### Configuration for term/doc/section 

 1. A toogle for including an automated screenshot.
 1. A url (`wp-admin` or otherwise) including a bookmark anchor that displays the functionality described in the doc. This anchor can represent a tab in a tabbed interface. This will be used to automate screenshots.
 1. A product repository. This will be used to trigger potential updates and notifications for updates.
 1. Need to think about form inputs (triggering a dropdown for screenshots, triggering selection of an option in such a dropdown, checkbox, radio, autocomplete, etc).
 
 
 The set-up would be a trickle down configuration that can be over-ridden at any level:

 1. Globally.
 1. At the level of a taxonomy term (associated with a particular product)
 1. At the level of a document (post-type)
 1. At the level of a section (gutenberg heading block followed by all content uptil the next heading, _or_ a custom doc section block)

### Workflow

On initial setup, using puppeteer (which is a wrapper for headless google chrome), this solution will generate:

 1. A screenshot of the associated dom element of the interface if specified.
 1. A text snapshot of the html content of the associated dom element. 
 1. A text snapshot of the css associated with rendered dom element.

Whenever a plugin or theme is released on a git repository (Github/ Bitbucket/ Gitlab)
 1. A webhook can be triggered which will call our solution into action.
 1. It will look for the taxonomy term in the docs (or individual docs) associated with the product.
 1. It will check the demo site whose url has been setup and re-scan everything.
 1. If it cannot find the associated DOM element, anymore, it'll assume that it has changed and trigger a notification to update the settings to the new identifier.
 1. If it still finds it, it will compare the new state with the saved snapshot.
     1. If there are no changes, it won't do anything.
	 1. If there are changes however, it will trigger a notification to update documentation.
	 1. In addition, it will regenerate and replace the original screenshot automatically.

### Components

 1. Documentation Plugin (to create docs and settings related to docs)
 1. Documentation Tracker (Node.js app) or an API based service for shared sites.
 
That's how much I could think of, at the moment. Will revise as needed
