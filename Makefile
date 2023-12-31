COMPOSER ?= $(shell which composer)
PHP ?= $(shell which php)

# Misc
.DEFAULT_GOAL = help
.PHONY        :

## —— 🐘 The Advent of Code 2023 🐘 ————————————————————————————————————————————
help: ## Outputs this help screen
	@grep -E '(^[a-zA-Z0-9_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}{printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'

up: install-vendor ## Install the project

serve: ## Run the project
	$(PHP) -S localhost:8000

new_day: ## Create a new day ( make new_day day=day_number )
	$(PHP) newday.php $(day)

## —— Composer 🧙 ——————————————————————————————————————————————————————————————
install-vendor: ## Install vendor
	$(PHP) $(COMPOSER) install

clean: clean-vendor clean-composerlock ## Clean the project

clean-vendor: ## Clean vendor
	$(RM) -r ./vendor

clean-composerlock: ## Clean composer.lock
	$(RM) composer.lock

## —— Tests ✅ —————————————————————————————————————————————————————————————————
current-tests: ## Run uncommitted tests
	./vendor/bin/pest --dirty

unit-tests: ## Run unit tests
	./vendor/bin/pest

unit-tests-group: ## Run unit tests by group ( make unit-tests-group group=day1 )
	./vendor/bin/pest --group=$(group)

unit-tests-coverage: ## Run unit tests with coverage
	XDEBUG_MODE=coverage ./vendor/bin/pest --coverage

## —— Coding standards ✨ ——————————————————————————————————————————————————————
code-sniffer: ## Run code sniffer
	./vendor/bin/pint --test

code-sniffer-fix: ## Run code sniffer and fix
	./vendor/bin/pint

## —— Static analysis 🔍 ———————————————————————————————————————————————————————

lint: ## Run Psalm static analysis
	./vendor/bin/psalm

lint-group: ## Run Psalm static analysis based on the group in "group" variable ( make lint-group group=Day1 )
	./vendor/bin/psalm src/Solutions/$(group)/*.php