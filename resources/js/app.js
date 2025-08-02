import './bootstrap';

import { createApp } from 'vue';

// Import Tabs Components
import { TabsContent, TabsList, TabsRoot, TabsTrigger } from 'radix-vue';

// Import Dropdown Components with the correct name
import {
  DropdownMenuRoot, // This was the cause of the error
  DropdownMenuContent,
  DropdownMenuItem,
  DropdownMenuLabel,
  DropdownMenuSeparator,
  DropdownMenuTrigger,
} from 'radix-vue';

const app = createApp({});

// Register Tabs
app.component('TabsRoot', TabsRoot);
app.component('TabsList', TabsList);
app.component('TabsTrigger', TabsTrigger);
app.component('TabsContent', TabsContent);

// Register Dropdown with kebab-case to match template usage
app.component('dropdown-menu-root', DropdownMenuRoot);
app.component('dropdown-menu-content', DropdownMenuContent);
app.component('dropdown-menu-item', DropdownMenuItem);
app.component('dropdown-menu-label', DropdownMenuLabel);
app.component('dropdown-menu-separator', DropdownMenuSeparator);
app.component('dropdown-menu-trigger', DropdownMenuTrigger);

app.mount('#app');